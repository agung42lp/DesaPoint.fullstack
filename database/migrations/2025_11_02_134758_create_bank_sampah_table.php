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
        Schema::create('bank_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('total_sampah', 10, 2)->default(0); // misal dalam kilogram
            $table->decimal('total_uang', 15, 2)->default(0);   // misal dalam rupiah
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_sampah');
    }
};
