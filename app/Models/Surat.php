<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Surat extends Model
{
    protected $table = 'surat'; // Menentukan nama tabel

    protected $primaryKey = 'id_surat'; // Menentukan primary key

    // Attribut yang dapat diisi (fillable) dalam model Surat
    protected $fillable = [
        'nomor_surat',
        'id_kategori',
        'judul',
        'waktu_pembuatan',
        'file_surat',
    ];

    // Relasi antara Surat dan Kategori, setiap Surat milik satu Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
