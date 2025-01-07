<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'jurusan_id',
        'no_hp',
    ];

    // Relasi ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

}