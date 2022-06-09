@extends('layouts.frontend')

@section('title')
    Kategori
@endsection

@section('content')
    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Detail Produk</h2>
                @foreach ($produk as $item)
                    <div class="col-md-4 mb-3">
                        <a href="{{ url('tampil-produk/'.$item->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/produk/'.$item->gambar) }}" style="width: 90px; height: 100px" alt="Gambar Produk">
                                <div class="card-body">
                                    <h5>{{ $item->nama }}</h5>
                                    <small>{{ $item->deskripsi }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection