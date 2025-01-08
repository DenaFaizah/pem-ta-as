<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuakir extends Model
{
    use HasFactory;

    protected $fillable = [
        'ko_ta',
        'judul_ta'
    ];
}
