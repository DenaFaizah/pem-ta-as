<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TuakirController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Auth routes untuk login dan registrasi
Auth::routes();

// Middleware untuk mengarahkan pengguna berdasarkan role
Route::middleware(['auth'])->group(function () {
    // Redirect setelah login berdasarkan role
    Route::get('/home', function () {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($role === 'operator') {
            return redirect('/operator/dashboard');
        }

        return redirect('/');
    })->name('home');

    // Rute khusus untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard'); // Buat file `resources/views/admin/dashboard.blade.php`
        })->name('admin.dashboard');

        Route::resource('admin.dosen', DosenController::class,[
            'names' => 'admin.dosen',
        ]);
        Route::resource('admin.jurusan', JurusanController::class,[
            'names' => 'admin.jurusan',
        ]);
    });


    // Rute khusus untuk operator

    Route::middleware(['role:admin,operator'])->group(function () {
        Route::resource('operator.mahasiswa', MahasiswaController::class);
        Route::resource('operator.tuakir', TuakirController::class);
        Route::resource('admin.mahasiswa', MahasiswaController::class);
        
        Route::resource('operator.tuakir', TuakirContrller::class, [
            'names' => 'operator.tuakir',
        ]);
    });
});