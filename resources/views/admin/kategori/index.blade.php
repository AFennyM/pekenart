@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Halaman Kategori</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/kategori/'.$item->gambar) }}" class="kategori_image" alt="Gambar Kategori">
                            </td>
                            <td>
                                <a href="{{ url('edit-kategori/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-kategori/'.$item->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection