@extends('layouts.admin')

@section('title', 'Form Edit Kategori') 

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
                Form Edit Kategori
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nama_kategori" class="font-weight-bold">Nama Kategori</label>
                        <input type="text" value="{{ $kategori->nama_kategori }}" name="nama_kategori" id="nama_kategori" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Keterangan</label>
                        <input type="text" value="{{ $kategori->judul }}" name="judul" id="judul" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-warning text-white" style="width: 100%" onclick="return confirm('APAKAH YAKIN?')">KIRIM</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        @if (Session::has('notif'))
        <div class="alert alert-danger">
            {{ Session::get('notif') }}
        </div>
        @endif
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
