@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Halaman Produk</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori->nama }}</td>
                            <td>{{ $item->harga_jual }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/produk/'.$item->gambar) }}" class="produk_image" alt="Gambar Produk">
                            </td>
                            <td>
                                <a href="{{ url('edit-produk/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-produk/'.$item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection