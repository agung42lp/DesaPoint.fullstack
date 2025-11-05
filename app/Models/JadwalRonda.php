<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalRonda extends Model
{
    protected $table = 'jadwal_ronda';
    protected $fillable = ['tanggal', 'peserta_ronda'];
}