<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\ItemPesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        return response()->json(
            [
                "message" => "success",
                "pesanan" => $pesanan
            ]
        );
    }

    public function getItemPesanan()
    {
        $itempesanan = ItemPesanan::all();
        return response()->json(
            [
                "message" => "success",
                "itempesanan" => $itempesanan
            ]
        );
    }

    public function setujuipesanan(Request $request)
    {
        $pesanan = new Pesanan();
        $pesanan->user_id = Auth::id();
        $pesanan->nama = $request->input('nama');
        $pesanan->email = $request->input('email');
        $pesanan->no_telp = $request->input('no_telp');
        $pesanan->alamat = $request->input('alamat');
        $pesanan->kota = $request->input('kota');
        $pesanan->provinsi = $request->input('provinsi');

        $total = 0;
        $keranjangitem_total = Keranjang::where('user_id', Auth::id())->get();
        foreach($keranjangitem_total as $produk)
        {
            $total += $produk->produk->harga_jual;
        } 
        $pesanan->total_harga = $total;

        $pesanan->no_track = 'orang'.rand(1111,9999);
        $pesanan->save();


        $keranjangitem = Keranjang::where('user_id', Auth::id())->get();
        foreach($keranjangitem as $item)
        {
            ItemPesanan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $item->produk_id,
                'kuantitas' => $item->produk_kuantitas,
                'harga' => $item->produk->harga_jual,
            ]);

            $produk = Produk::where('id', $item->produk_id)->first();
            $produk->kuantitas = $produk->kuantitas - $item->produk_kuantitas;
            $produk->update();
        }

        if(Auth::user()->alamat == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('nama');
            
            $user->no_telp = $request->input('no_telp');
            $user->alamat = $request->input('alamat');
            $user->kota = $request->input('kota');
            $user->provinsi = $request->input('provinsi');
            $user->update();
        }

        $keranjangitem = Keranjang::where('user_id', Auth::id())->get();
        Keranjang::destroy($keranjangitem);

        return redirect('/')->with('status', "Berhasil memesan");
    }
}

