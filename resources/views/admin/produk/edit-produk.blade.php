@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Produk</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-produk/'.$produk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{ $produk->kategori->nama }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ $produk->nama }}" name="nama">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $produk->slug }}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat" rows="3" class="form-control">{{ $produk->deskripsi_singkat }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="form-control">{{ $produk->deskripsi }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Harga Asli</label>
                        <input type="number" value="{{ $produk->harga_asli }}" class="form-control" name="harga_asli">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Harga Jual</label>
                        <input type="number" value="{{ $produk->harga_jual }}" class="form-control" name="harga_jual">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Pajak</label>
                        <input type="number" value="{{ $produk->pajak }}" class="form-control" name="pajak">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Kuantitas</label>
                        <input type="number" value="{{ $produk->kuantitas }}" class="form-control" name="kuantitas">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $produk->status == "1" ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tren</label>
                        <input type="checkbox" {{ $produk->tren == "1" ? 'checked' : '' }} name="tren">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Kategori Label</label>
                        <input type="text" value="{{ $produk->kategori_label }}" class="form-control" name="kategori_label">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Kategori Keywords</label>
                        <textarea name="kategori_keywords" rows="3" class="form-control">{{ $produk->kategori_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Deskripsi Kategori</label>
                        <textarea name="kategori_deskripsi" rows="3" class="form-control">{{ $produk->kategori_deskripsi }}</textarea>
                    </div>
                    @if ($produk->gambar)
                        <img src="{{ asset('assets/uploads/produk/'.$produk->gambar) }}" alt="">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
@endsection