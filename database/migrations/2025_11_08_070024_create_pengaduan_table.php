<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->string('rt');
            $table->string('nomor_rumah');
            $table->string('no_hp');
            $table->string('judul_permasalahan');
            $table->string('kategori');
            $table->text('detail_permasalahan');
            $table->string('foto_1')->nullable();
            $table->string('foto_2')->nullable();
            $table->enum('status', ['diterima', 'diproses', 'selesai', 'ditolak'])->default('diterima');
            $table->text('tanggapan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};