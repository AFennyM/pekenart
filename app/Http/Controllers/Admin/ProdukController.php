<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function add()
    {
        $kategori = Kategori::all();
        return view('admin.produk.tambah', compact('kategori'));
    }

    public function insert(Request $request)
    {

        $produk = new Produk();
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('assets/uploads/produk/', $filename);
            $produk->gambar = $filename;
        }
        $produk->kategori_id = $request->input('kategori_id');
        $produk->nama = $request->input('nama');
        $produk->slug = $request->input('slug');
        $produk->deskripsi_singkat = $request->input('deskripsi_singkat');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga_asli = $request->input('harga_asli');
        $produk->harga_jual = $request->input('harga_jual');
        $produk->pajak = $request->input('pajak');
        $produk->kuantitas = $request->input('kuantitas');
        $produk->status = $request->input('status') == TRUE ? '1' : '0';
        $produk->tren = $request->input('tren') == TRUE ? '1' : '0';
        $produk->kategori_label = $request->input('kategori_label');
        $produk->kategori_keywords = $request->input('kategori_keywords');
        $produk->kategori_deskripsi = $request->input('kategori_deskripsi');
        $produk->save();
        return redirect('produk')->with('status', 'Produk Berhasil di Tambah');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('admin.produk.edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if($request->hasFile('gambar'))
        {
            $path = 'assets/uploads/produk/'.$produk->gambar;
            if(File::exists($path))
            {
                File::delete($path); 
            }
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('assets/uploads/produk', $filename);
            $produk->gambar = $filename;
        }
        // $produk->kategori_id = $request->input('kategori_id');
        $produk->nama = $request->input('nama');
        $produk->slug = $request->input('slug');
        $produk->deskripsi_singkat = $request->input('deskripsi_singkat');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga_asli = $request->input('harga_asli');
        $produk->harga_jual = $request->input('harga_jual');
        $produk->pajak = $request->input('pajak');
        $produk->kuantitas = $request->input('kuantitas');
        $produk->status = $request->input('status') == TRUE ? '1' : '0';
        $produk->tren = $request->input('tren') == TRUE ? '1' : '0';
        $produk->kategori_label = $request->input('kategori_label');
        $produk->kategori_keywords = $request->input('kategori_keywords');
        $produk->kategori_deskripsi = $request->input('kategori_deskripsi');
        $produk->update();
        return redirect('produk')->with('status', 'Produk Berhasil di Update');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if($produk->gambar)
        {
            $path = 'assets/uploads/produk/'.$produk->gambar;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $produk->delete();
        return redirect('produk')->with('status', 'Berhasil menghapus produk');
    }
    
}
