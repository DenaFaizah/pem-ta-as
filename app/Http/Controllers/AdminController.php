<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('home'); // Tampilkan dashboard admin
    }

    public function jurusan()
    {
        return view('jurusan.index'); // Tampilkan folder jurusan -> file index.blade.php
    }

    public function tuakir()
    {
        return view('tuakir.index'); // Tampilkan halaman tuakir
    }

    public function dosen()
    {
        return view('dosen.index'); // Tampilkan halaman dosen
    }

    public function mahasiswa()
    {
        return view('mahasiswa.index'); // Tampilkan halaman mahasiswa
    }
}
