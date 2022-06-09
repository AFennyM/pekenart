@extends('layouts.frontend')

@section('title')
    Selamat datang di PekenArt
@endsection

@section('content')
    @include('layouts.inc.slider')
    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Kategori Produk</h2>
                <div class="owl-carousel fitur-carousel owl-theme">
                    @foreach ($fitur_kategori as $item)
                        <div class="item">
                            <a href="{{ url('kategori-produk/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/kategori/'.$item->gambar) }}" alt="Gambar Kategori">
                                    <div class="card-body">
                                        <h5>{{ $item->nama }}</h5>
                                        <small>{{ $item->deskripsi }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{-- @foreach ($fitur_produk as $shop_produk) --}}
                <div class="row">
                    <h2>Produk</h2>
                </div>
                @foreach ($fitur_produk as $shop_produk)
                    <div class="col-md-3 mt-3">
                        
                        
                        <div class="card">
                            {{-- <a href="{{ url('tampil-produk/'.$item->id) }}"> --}}
                                <img src="{{ asset('assets/uploads/produk/'.$shop_produk->gambar) }}"  style="height: 250px;" alt="Gambar Produk">
                                <div class="card-body">
                                    <h5>{{ $shop_produk->nama }}</h5>
                                    <span class="float-start"><b>Rp</b></span>
                                    <span class="float-end">{{ $shop_produk->harga_jual }}</span>
                                </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.fitur-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
@endsection