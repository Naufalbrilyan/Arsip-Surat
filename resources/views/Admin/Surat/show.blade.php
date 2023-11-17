@extends('layouts.admin')

@section('title', 'Detail Surat')

@section('content')
    <div class="container">
        <h1>Detail Surat</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $surat->judul }}</h3>
                        <p class="card-text">
                            <strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}<br>
                            <strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }}<br>
                            <strong>Waktu Pembuatan:</strong> {{ $surat->waktu_pembuatan }}<br>
                        </p>
                    </div>
                    <div class="card-footer">
                    <embed src="{{ Storage::url($surat->file_surat) }}" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('surat.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
@endsection
