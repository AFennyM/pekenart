<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\ItemPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->get();
        return view('frontend.pesanan.index', compact('pesanan'));
    }

    public function view($id)
    {
        $pesanan = Pesanan::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.pesanan.cek', compact('pesanan'));
    }
    
}
