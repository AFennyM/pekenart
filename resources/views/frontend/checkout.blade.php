@extends('layouts.frontend')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ url('setujui-pesanan') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Form Pesan</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" placeholder="Masukan Nama">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Nama">Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Masukan Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Nama">Nomor Telepon</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->no_telp }}" name="no_telp" placeholder="Masukan Nomor Telepon">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Nama">Alamat</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->alamat }}" name="alamat" placeholder="Masukan Alamat">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Nama">Kota</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->kota }}" name="kota" placeholder="Masukan Kota">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Nama">Provinsi</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->provinsi }}" name="provinsi" placeholder="Masukan Provinsi">
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                    <label for="Nama">Kode Pin</label>
                                    <input type="text" class="form-control" placeholder="Masukan Kode Pin">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detail Pesanan</h6>
                            <hr>
                            <table class="table">
                                <thead>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                </thead>
                                <tbody>
                                    @foreach ($keranjangitem as $item)
                                        <tr>
                                            <td>{{ $item->produk->nama }}</td>
                                            <td>{{ $item->produk_kuantitas }}</td>
                                            <td>{{ $item->produk->harga_jual }}</td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
@endsection