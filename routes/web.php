<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);

// Jurusan
Route::resource('jurusan', JurusanController::class);

//Dosen
Route::resource('dosen', DosenController::class);