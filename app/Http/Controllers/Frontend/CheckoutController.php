<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\ItemPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjangitem_lama = Keranjang::where('user_id', Auth::id())->get();
        foreach($keranjangitem_lama as $item)
        {
            if(!Produk::where('id', $item->produk_id)->where('kuantitas', '>=', $item->produk_kuantitas)->exists())
            {
                $hapusItem = Keranjang::where('user_id', Auth::id())->where('produk_id', $item->produk_id)->first();
                $hapusItem->delete();
            }
        }
        $keranjangitem = Keranjang::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('keranjangitem'));
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
