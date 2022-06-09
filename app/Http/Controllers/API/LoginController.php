<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        if(Auth::user()->level_user == '1') //Admin Login
        {
            return redirect('dashboard')->with('status', 'Welcome to your dashboard');
        }
        elseif(Auth::user()->level_user == '0') //User Login default
        {
            return redirect('/')->with('status', 'Logged in succesfully');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

