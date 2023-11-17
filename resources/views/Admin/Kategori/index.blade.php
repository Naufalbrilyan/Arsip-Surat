@extends('layouts.admin')

@section('title', 'Halaman Kategori')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Kategori')

@section('content')
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<a href="{{ route('kategori.create') }}" class="btn btn-purple mb-2">Tambah Kategori</a>
<div class="table-responsive">
    <table id="kategoriTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k => $v)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $v->nama_kategori }}</td>
                <td>{{ $v->judul }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $v->id_kategori) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('kategori.destroy', $v->id_kategori) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                    </form>
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
        $('#kategoriTable').DataTable();
    });
</script>
@endsection
