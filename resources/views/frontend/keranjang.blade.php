@extends('layouts.frontend')

@section('title')
    Keranjang Saya
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
            Home
            </a> / 
            <a href="{{ url('keranjang') }}">
            Keranjang
            </a> 
        </h6>
    </div>
</div>
<div class="container my-5"></div>
    <div class="card shadow ">
        <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($keranjangitem as $item)
                    <div class="row produk_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/produk/'.$item->produk->gambar) }}" height="90px" width="90px" alt="Gambar">
                        </div>
                        <div class="col-md-2">
                            <h5>{{ $item->produk->nama }}</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Rp {{ $item->produk->harga_jual }}</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="produk_id" value="{{ $item->produk_id }}">
                            @if($item->produk->kuantitas >= $item->produk_kuantitas)
                                <label for="Kuantitas">Kuantitas</label>
                                <div class="input-group text-center mb-3" style="width: 120px">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="kuantitas"  value="{{ $item->produk_kuantitas }}" class="form-control kuantitas-input text-center"/>
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div>
                                @php $total += $item->produk->harga_jual * $item->produk_kuantitas; @endphp
                            @else
                                <h6>Stok Habis</h6>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger hapus-keranjang-item">x</button>
                        </div>
                    </div>
                
                @endforeach
        </div>
        <div class="card-footer">
            <h6 class="float-end">Total Harga : Rp {{ $total }}</h6>
            <a href="{{ url('checkout') }}" class="btn btn-outline" style="background-color: rgb(113, 157, 228) ">Checkout</a>
        </div>
    </div>
</div>
@endsection
