<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function addProduk(Request $request)
    {
        $produk_id = $request->input('produk_id');
        $produk_kuantitas = $request->input('produk_kuantitas');

        if(Auth::check())
        {
            $produk_check = Produk::where('id', $produk_id)->first();

            if($produk_check)
            {
                if(Keranjang::where('produk_id', $produk_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $produk_check->nama. " Sudah ada di Keranjang"]);
                }
                else
                {
                    $keranjangItem = new Keranjang();
                    $keranjangItem->produk_id = $produk_id;
                    $keranjangItem->user_id = Auth::id();
                    $keranjangItem->produk_kuantitas = $produk_kuantitas;
                    $keranjangItem->save();
                    return response()->json(['status' => $produk_check->nama. " Ditambah ke Keranjang"]);
                }
               
            }
        }
        else{
            return response()->json(['status' => "Login untuk melanjutkan"]);
        }
    }

    public function tampilKeranjang()
    {
        $keranjangitem = Keranjang::where('user_id', Auth::id())->get();
        return view('frontend.keranjang', compact('keranjangitem'));
    }

    public function hapusProduk(Request $request)
    {
        if(Auth::check())
        {
            $produk_id = $request->input('produk_id');
            if(Keranjang::where('produk_id', $produk_id)->where('user_id', Auth::id())->exists())
            {
                $keranjangItem = Keranjang::where('produk_id', $produk_id)->where('user_id', Auth::id())->first();
                $keranjangItem->delete();
                return response()->json(['status' => "Produk berhasil dihapus"]);
            }
        }
        else{
            return response()->json(['status' => "Login untuk melanjutkan"]);
        }
    }

    public function updateKeranjang(Request $request)
    {
        $produk_id = $request->input('produk_id');
        $produk_kuantitas = $request->input('produk_kuantitas');

        if(Auth::check())
        {
            if(Keranjang::where('produk_id', $produk_id)->where('user_id', Auth::id())->exists())
            {
                $keranjang = Keranjang::where('produk_id', $produk_id)->where('user_id', Auth::id())->first();
                $keranjang->produk_kuantitas = $produk_kuantitas;
                $keranjang->update();
                return response()->json(['status' => "Kuantitas diupdate"]);
            }
        }
    }
}
