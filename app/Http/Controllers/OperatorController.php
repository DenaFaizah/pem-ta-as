<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            'tuakir' => route('tuakir'),
        ]); // Tampilkan view untuk operator dashboard dengan link ke akun tuakir
    }

    /**
     * Tampilkan akun tuakir.
     */
    public function tuakir()
    {
        return view('tuakir'); // Tampilkan view untuk akun tuakir
    }

    /**
     * Show the form for creating a new tuakir account.
     */
    public function createTuakir()
    {
        return view('tuakir.create'); // Tampilkan form untuk membuat akun tuakir baru
    }

    /**
     * Store a newly created tuakir account in storage.
     */
    public function storeTuakir(Request $request)
    {
        // Logika untuk menyimpan akun tuakir baru
    }

    /**
     * Display the specified tuakir account.
     */
    public function showTuakir(string $id)
    {
        // Logika untuk menampilkan detail akun tuakir
    }

    /**
     * Show the form for editing the specified tuakir account.
     */
    public function editTuakir(string $id)
    {
        return view('tuakir.edit', ['id' => $id]); // Tampilkan form untuk mengedit akun tuakir
    }

    /**
     * Update the specified tuakir account in storage.
     */
    public function updateTuakir(Request $request, string $id)
    {
        // Logika untuk mengupdate akun tuakir
    }

    /**
     * Remove the specified tuakir account from storage.
     */
    public function destroyTuakir(string $id)
    {
        // Logika untuk menghapus akun tuakir
    }
}
