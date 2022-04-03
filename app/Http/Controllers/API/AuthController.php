<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:200|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('artshopProjectToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
    public function logout()
    {
        $tokenId = Str::before(request()->bearerToken(), '|');
        auth()->user()->tokens()->where('id', $tokenId )->delete();

        return response(['message'=>'Berhasil Logout']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:200',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response(['message'=>'Invalid Credentials'], 401);
        }
        else
        {
            $token = $user->createToken('artshopProjectTokenLogin')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];

            return response($response, 200);
        }
    }
}
