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

        return redirect('/'); // Jika role tidak sesuai
    })->name('home');

    // Rute khusus untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard'); // Buat file `resources/views/admin/dashboard.blade.php`
        })->name('admin.dashboard');

        // Admin dapat mengakses semua resource
            Route::resource('admin/dosen', DosenController::class)
                ->names([
                    'index' => 'admin.dosen.index',
                    'create' => 'admin.dosen.create',
                    'store' => 'admin.dosen.store',
                    'show' => 'admin.dosen.show',
                    'edit' => 'admin.dosen.edit',
                    'update' => 'admin.dosen.update',
                    'destroy' => 'admin.dosen.destroy',
                ]);

            Route::resource('admin/jurusan', JurusanController::class)
                ->names([
                    'index' => 'admin.jurusan.index',
                    'create' => 'admin.jurusan.create',
                    'store' => 'admin.jurusan.store',
                    'show' => 'admin.jurusan.show',
                    'edit' => 'admin.jurusan.edit',
                    'update' => 'admin.jurusan.update',
                    'destroy' => 'admin.jurusan.destroy',
                ]);

            Route::resource('admin/mahasiswa', MahasiswaController::class)
                ->names([
                    'index' => 'admin.mahasiswa.index',
                    'create' => 'admin.mahasiswa.create',
                    'store' => 'admin.mahasiswa.store',
                    'show' => 'admin.mahasiswa.show',
                    'edit' => 'admin.mahasiswa.edit',
                    'update' => 'admin.mahasiswa.update',
                    'destroy' => 'admin.mahasiswa.destroy',
                ]);

            Route::resource('admin/tuakir', TuakirController::class)
                ->names([
                    'index' => 'admin.tuakir.index',
                    'create' => 'admin.tuakir.create',
                    'store' => 'admin.tuakir.store',
                    'show' => 'admin.tuakir.show',
                    'edit' => 'admin.tuakir.edit',
                    'update' => 'admin.tuakir.update',
                    'destroy' => 'admin.tuakir.destroy',
                ]);
        });

    // Rute untuk operator
    Route::middleware(['role:operator'])->group(function () {
        Route::get('/operator/dashboard', function () {
            return view('operator.dashboard'); 
        })->name('operator.dashboard');

        Route::resource('operator/mahasiswa', MahasiswaController::class)
            ->names([
                'index' => 'operator.mahasiswa.index',
                'create' => 'operator.mahasiswa.create',
                'store' => 'operator.mahasiswa.store',
                'show' => 'operator.mahasiswa.show',
                'edit' => 'operator.mahasiswa.edit',
                'update' => 'operator.mahasiswa.update',
                'destroy' => 'operator.mahasiswa.destroy',
            ]);
        Route::resource('operator/tuakir', TuakirController::class)
            ->names([
                'index' => 'operator.tuakir.index',
                'create' => 'operator.tuakir.create',
                'store' => 'operator.tuakir.store',
                'show' => 'operator.tuakir.show',
                'edit' => 'operator.tuakir.edit',
                'update' => 'operator.tuakir.update',
                'destroy' => 'operator.tuakir.destroy',
            ]);
    });
});
