@extends('layouts.frontend')

@section('title')
    Kategori
@endsection

@section('content')
    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Kategori Produk</h2>
                @foreach ($kategori as $item)
                    <div class="col-md-4 mb-3">
                        <a href="{{ url('kategori-produk/{slug}'.$item->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/kategori/'.$item->gambar) }}" style="width: 90px; height: 100px" alt="Gambar Kategori">
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