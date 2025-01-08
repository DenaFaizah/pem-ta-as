<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan namespace untuk HasFactory
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel (plural lowercase), tentukan nama tabel
    protected $table = 'dosens'; // Pastikan nama tabel benar (sesuai dengan database Anda)
    
    // Daftar atribut yang dapat diisi secara massal
    protected $fillable = [
        'nidn',
        'nama',
        'email'
    ];
}
