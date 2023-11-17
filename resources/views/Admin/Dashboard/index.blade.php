@extends('layouts.admin')

@section('title', 'Halaman Dashboard')
    
@section('header', 'Dashboard')

@section('content')
@if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        h1 {
            color: #333;
        }

        img {
            max-width: 50%;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }

        strong {
            color: #333;
        }
    </style>

    <div class="container">
        <h1>BIODATA</h1>
        <img src="{{ asset('storage/assets/foto.jpeg') }}" alt="Foto Profil">
        <p><strong>Nama:</strong> Naufal Brilyan Ar Rochman</p>
        <p><strong>NIM:</strong> 2131730086</p>
        <p><strong>Prodi:</strong> D3 Manajemen Informatika</p>      
        <p><strong>Alamat:</strong> Bandar Kidul</p>
        <p><strong>Telepon:</strong> 081357602946</p>
    </div>
@endsection
