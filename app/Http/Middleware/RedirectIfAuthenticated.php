<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // Pastikan menggunakan namespace Auth yang benar
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()) { // Memeriksa apakah pengguna sudah login
            $role = Auth::user()->role; // Mendapatkan role pengguna

            if ($role === 'admin') {
                return redirect('/admin'); // Redirect ke halaman admin
            } elseif ($role === 'operator') {
                return redirect('/operator'); // Redirect ke halaman operator
            }
        }

        return $next($request); // Lanjutkan permintaan jika tidak ada masalah
    }
}
