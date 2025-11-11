<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('baksos');
    }

    public function down(): void
    {
        Schema::create('baksos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};
