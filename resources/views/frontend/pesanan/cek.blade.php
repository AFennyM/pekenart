@extends('layouts.frontend')

@section('title')
    Pesanan Saya
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cek Pesanan</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nama</label>
                            <div class="border p-2">{{ $pesanan->nama }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $pesanan->email }}</div>
                            <label for="">Alamat</label>
                            <div class="border p-2">{{ $pesanan->alamat }}</div>
                            <label for="">No. Telp</label>
                            <div class="border p-2">{{ $pesanan->no_telp }}</div>
                            <label for="">Alamat Shipping</label>
                            <div class="border p-2">
                                {{ $pesanan->alamat }},
                                {{ $pesanan->kota }},
                                {{ $pesanan->provinsi }},
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No. Track</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $item)
                                        <tr>
                                            <td>{{ $item->no_track }}</td>
                                            <td>{{ $item->total_harga }}</td>
                                            <td>{{ $item->status == '0' ? 'diproses' : 'sudah diterima' }}</td>
                                            <td>
                                                <a href="{{ url('cek-pesanan/'.$item->id) }}" class="btn btn-primary" style="background-color: rgb(115, 176, 226)">Cek</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection