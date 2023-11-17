@extends('layouts.admin')

@section('title', 'Halaman Surat') 

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Surat')

@section('content')
<a href="{{ route('surat.create') }}" class="btn btn-purple mb-2">Arsipkan Surat</a>

<div class="table-responsive">
    <table id="suratTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pembuatan</th>
                <th>Hapus</th>
                <th>Detail</th>
                <th>Unduh</th> <!-- Perubahan pada bagian ini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($surat as $k => $v)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $v->nomor_surat }}</td>
                <td>{{ $v->kategori->nama_kategori }}</td>
                <td>{{ $v->judul }}</td>
                <td>{{ $v->waktu_pembuatan }}</td>
                <td>
                    <form action="{{ route('surat.destroy', $v->id_surat) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
                <td><a href="{{ route('surat.show', $v->id_surat) }}" class="btn btn-warning">Lihat</a></td>
                <td>
                <a href="{{ route('unduh-arsip', $v->id_surat) }}" class="btn btn-success">Unduh</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#suratTable').DataTable();
    });
</script>
@endsection
