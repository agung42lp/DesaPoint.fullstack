<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    protected $table = 'laporan_keuangan';
    
    protected $fillable = [
        'tanggal',
        'keterangan',
        'debit',
        'kredit',
        'saldo'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'debit' => 'decimal:2',
        'kredit' => 'decimal:2',
        'saldo' => 'decimal:2'
    ];
}