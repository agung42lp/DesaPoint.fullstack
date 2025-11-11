<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanaSosial extends Model
{
    protected $table = 'dana_sosial';
    
    protected $fillable = [
        'nama_penerima',
        'tanggal_penyerahan',
        'kategori_bantuan',
        'nominal_bantuan',
        'foto_penyerahan'
    ];

    protected $casts = [
        'tanggal_penyerahan' => 'date',
        'nominal_bantuan' => 'decimal:2'
    ];
}