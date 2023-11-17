<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->string('nomor_surat');
            $table->unsignedBigInteger('id_kategori');
            $table->string('judul');
            $table->timestamp('waktu_pembuatan');
            $table->string('file_surat');


            // Menambahkan foreign key constraint ke tabel kategori
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
