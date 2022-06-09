@extends('layouts.frontend')

@section('title')



@section('content')
<div class="py-3 mb-4 shadow-sm border-top">
    <div class="container">
        {{-- <h6 class="mb-0">Produk / {{ $produk->id }}</h6> --}}
    </div>
</div>
        <div class="container">
            <div class="card shadow produk_data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('assets/uploads/produk/'.$produk->gambar) }}" class="w-100" alt="Gambar Detail Produk">
                        </div>
                        <div class="col-md-8">
                            <h2 class="mb-0">
                                {{ $produk->nama }}
                                {{-- <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">{{ $produk->tren == '1' ? 'Trending':'' }}</label> --}}
                            </h2>

                            <hr>
                            <label class="me-3">Harga Jual : Rp {{ $produk->harga_jual }} </label>
                            <p class="mt-3">
                                {!! $produk->deskripsi !!}
                            </p>
                            <hr>
                            @if ($produk->kuantitas > 0)
                                <label class="badge bg-success">Tersedia</label>
                            @else
                                <label class="badge bg-danger">Habis</label>
                            @endif
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <input type="hidden" value="{{ $produk->id }}" class="produk_id">
                                    <label for="Kuantitas">Kuantitas</label>
                                    <div class="input-group text-center mb-3" style="width: 120px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="kuantitas"  value="1" class="form-control kuantitas-input text-center"/>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                            </div>
                            @if ($produk->kuantitas > 0)
                                <button type="button" class="btn btn-success me-3 addToCartBtn float-start" style="background-color:rgb(117, 152, 213)">+ Keranjang</button>
                            @else
                            @endif
                            <div class="row mt3">
                                <div class="col-md-10">  
                                    <br>
                                    {{-- <button type="button" class="btn btn-success me-3 float-start" style="background-color:rgb(117, 152, 213)">+ Wishlist</button> --}}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
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
            </div> --}}
        </div>


@endsection
{{-- 
@section('scripts')
<script>
    $(document).ready(function () {

        $('.addToCartBtn').click(function (e) {
            e.preventDefault();

            var produk_id = $(this).closest('.produk_data').find('.produk_id').val();
            var produk_kuantitas = $(this).closest('.produk_data').find('.kuantitas-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/tambah-ke-keranjang",
                data: {
                    'produk_id': produk_id,
                    'produk_kuantitas': produk_kuantitas,
                },
                success: function (response) {
                    swal(response.status);
                }
            });
            // alert(produk_id);
            // alert(produk_kuantitas);
        });

        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $('.kuantitas-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.kuantitas-input').val(value);
            }
        });

    });

    $(document).ready(function () {
        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $('.kuantitas-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.kuantitas-input').val(value);
            }
        });

    });
</script>    
@endsection --}}