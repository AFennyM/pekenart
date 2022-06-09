@extends('layouts.frontend')

@section('title')
{{ $kategori->nama }}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">Produk / {{ $kategori->nama }}</h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $kategori->nama }}</h2>
                    @foreach ($produk as $item)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{ url('kategori-produk/'.$kategori->slug.'/'.$item->slug) }}">
                                    <img src="{{ asset('assets/uploads/produk/'.$item->gambar) }}" class="w-100" alt="Gambar Kategori">
                                    <div class="card-body">
                                        <h5>{{ $item->nama }}</h5>
                                        <span class="float-start"><b>Rp</b></span>
                                        <span class="float-end">{{ $item->harga_jual }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection