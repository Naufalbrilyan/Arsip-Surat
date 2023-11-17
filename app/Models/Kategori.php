<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kategori extends Model
{
    protected $table = 'kategori'; // Menentukan nama tabel

    protected $primaryKey = 'id_kategori'; // Menentukan primary key

    // Attribut yang dapat diisi (fillable) dalam model Kategori
    protected $fillable = [
        'nama_kategori',
        'judul',
    ];

    // Relasi antara Kategori dan Surat, satu Kategori bisa memiliki banyak Surat
    public function surats()
    {
        return $this->hasMany(Surat::class, 'id_kategori');
    }
}
