@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Kategori</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-kategori') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Populer</label>
                        <input type="checkbox" name="populer">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Kategori Label</label>
                        <input type="text" class="form-control" name="kategori_label">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Kategori Keywords</label>
                        <textarea name="kategori_keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Deskripsi Kategori</label>
                        <textarea name="kategori_deskripsi" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
@endsection