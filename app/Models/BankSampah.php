<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    protected $table = 'bank_sampah';
    protected $fillable = [
    'nama', 
    'total_sampah', 
    'total_konversi',
    'saldo_cair',
    'saldo_tersisa'
];
}