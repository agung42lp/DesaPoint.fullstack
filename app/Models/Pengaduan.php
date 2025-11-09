<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';

    protected $fillable = [
        'nama_pengirim', 'rt', 'nomor_rumah', 'no_hp', 'judul_permasalahan',
        'kategori', 'detail_permasalahan', 'foto_1', 'foto_2', 'status', 'tanggapan'
    ];
}