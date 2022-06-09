<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function index()
    {
        $fitur_produk = Produk::where('tren', '1')->take(15)->get();
        $fitur_kategori = Kategori::where('populer', '1')->take(15)->get();
        return view('frontend.index', compact('fitur_produk', 'fitur_kategori'));
    }

    public function kategori()
    {
        $kategori = Kategori::where('status', '0')->get();
        return view('frontend.kategori', compact('kategori'));
    }

    public function lihatkategori($slug)
    {
        if(Kategori::where('slug', $slug)->exists())
        {
            $kategori = Kategori::where('slug', $slug)->first();
            $produk = Produk::where('kategori_id', $kategori->id)->where('status', '0')->get();
            return view('frontend.produk.index', compact('kategori', 'produk'));
        }
        else{
            return redirect('/')->with('status', "Slug Tidak Ada");
        }
    }

    public function lihatproduk($kategori_slug, $produk_slug)
    {
        if(Kategori::where('slug', $kategori_slug)->exists())
        {
            if(Produk::where('slug', $produk_slug)->exists())
            {
                $produk = Produk::where('slug', $produk_slug)->first();
                return view('frontend.produk.view', compact('produk'));
            }
            else{
                return redirect('/')->with('status', "Link Not Found");
            }
        }
        else{
            return redirect('/')->with('status', "Data kategori tidak ditemukan");
        }
    }

    // public function viewproduk($id)
    // {
    //     $produk = Produk::find($id);
    //     return view('frontend.produk.view', compact('produk'));
    // }

}
