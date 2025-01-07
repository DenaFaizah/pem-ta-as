<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TuakirController;

// Route untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route untuk autentikasi
Auth::routes();

// Route untuk home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk Admin
Route::middleware('role:admin')->group(function () {
    Route::resource('dosen', DosenController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('tuakir', TuakirController::class);
});

// Route untuk Operator
Route::middleware('role:operator')->group(function () {
    Route::resource('operator.tuakir', TuakirController::class);
});