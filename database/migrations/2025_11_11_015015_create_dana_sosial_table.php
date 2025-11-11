<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dana_sosial', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->date('tanggal_penyerahan');
            $table->enum('kategori_bantuan', ['korban_meninggal', 'penderita_sakit', 'korban_bencana']);
            $table->decimal('nominal_bantuan', 15, 2);
            $table->string('foto_penyerahan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dana_sosial');
    }
};