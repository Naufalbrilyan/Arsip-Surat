@extends('layouts.admin')

@section('title', 'Form Tambah Kategori') <!-- Ubah judul form -->

@section('css')
<style>
    .text-primary:hover {
        text-decoration: underline;
    }

    .text-grey {
        color: #6c757d;
    }

    .text-grey:hover {
        color: #6c757d;
    }
</style>
@endsection

@section('content')
<a href="{{ route('kategori.index') }}" class="btn btn-primary mb-3">Kembali</a>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Form Tambah Kategori
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama_kategori" class="font-weight-bold">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Keterangan</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success" style="width: 100%">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-12">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endforeach
    @endif
</div>
</div>
@endsection
