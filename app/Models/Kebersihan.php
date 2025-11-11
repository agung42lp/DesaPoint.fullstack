<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebersihan extends Model
{
    protected $table = 'kebersihan';
    
    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'image',
        'status'
    ];
}