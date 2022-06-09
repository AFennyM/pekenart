<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json(
            [
                "message" => "success",
                "kategori" => $kategori
            ]
        );
    }

    public function add()
    {
        return view('admin.kategori.tambah');
    }

    public function insert(Request $request)
    {

        $kategori = new Kategori();
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('assets/uploads/kategori', $filename);
            $kategori->gambar = $filename;
        }

        $kategori->nama = $request->input('nama');
        $kategori->slug = $request->input('slug');
        $kategori->deskripsi = $request->input('deskripsi');
        $kategori->status = $request->input('status') == TRUE ? '1' : '0';
        $kategori->populer = $request->input('populer') == TRUE ? '1' : '0';
        $kategori->kategori_label = $request->input('kategori_label');
        $kategori->kategori_keywords = $request->input('kategori_keywords');
        $kategori->kategori_deskripsi = $request->input('kategori_deskripsi');
        $kategori->save();
        return response()->json(
            [
                "message" => "success",
                "kategori" => $kategori,
            ]
        );
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit-kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        if($request->hasFile('gambar'))
        {
            $path = 'assets/uploads/kategori/'.$kategori->gambar;
            if(File::exists($path))
            {
                File::delete($path); 
            }
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('assets/uploads/kategori', $filename);
            $kategori->gambar = $filename;
        }
        $kategori->nama = $request->input('nama');
        $kategori->slug = $request->input('slug');
        $kategori->deskripsi = $request->input('deskripsi');
        $kategori->status = $request->input('status') == TRUE ? '1' : '0';
        $kategori->populer = $request->input('populer') == TRUE ? '1' : '0';
        $kategori->kategori_label = $request->input('kategori_label');
        $kategori->kategori_keywords = $request->input('kategori_keywords');
        $kategori->kategori_deskripsi = $request->input('kategori_deskripsi');
        $kategori->update();
        return response()->json(
            [
                "message"=>"Update Data Berhasil pada Kategori ". $id,
                "data"=>$kategori
            ]
        );
    }

    public function destroy($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        if ($kategori) {
            $kategori->delete();
            return response()->json(
                [
                    "message"=>"Hapus Kategori ID ". $id." sukses"
                ]
            );
        }
        return response()->json(
            [
                "message"=>"Kategori dengan ID ". $id." Tidak Ditemukan"
            ],
            400
        );
    }

}


