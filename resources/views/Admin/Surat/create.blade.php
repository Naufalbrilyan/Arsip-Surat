@extends('layouts.admin')

@section('title', 'Form Tambah Surat')

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

@section('header')
<a href="{{ route('surat.index') }}" class="text-primary">Data Surat</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Form Tambah Surat</a>
@endsection

@section('content')
<a href="{{ route('surat.index') }}" class="btn btn-primary mb-3">Kembali</a>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Form Tambah Surat
            </div>
            <div class="card-body">
                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nomor_surat" class="font-weight-bold">Nomor Surat</label>
                        <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="id_kategori" class="font-weight-bold">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="custom-select">
                            @foreach ($kategoriList as $kategori)
                                <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <div class="form-group">
                                    <label for="file_surat"class="font-weight-bold" >File Surat</label>

                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="file_surat" value="{{ old('file_surat') }}">

                                        @error('file_surat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                    <button type="submit" class="btn btn-success text-white" style="width: 100%">Simpan</button>
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
@endsection
