<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans'; 

    protected $fillable = [
        'nama',
    ];

    // Relasi ke model Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'jurusan_id');
    }
}