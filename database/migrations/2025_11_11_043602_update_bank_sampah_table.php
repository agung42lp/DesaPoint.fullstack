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
        Schema::table('bank_sampah', function (Blueprint $table) {
            $table->dropColumn('created_at', 'updated_at');
            $table->decimal('total_konversi', 15, 2);
            $table->decimal('saldo_cair', 15, 2);
            $table->decimal('saldo_tersisa', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_sampah', function (Blueprint $table) {
            $table->dropColumn(['total_konversi', 'dana_cair', 'saldo']);

        });
    }
};