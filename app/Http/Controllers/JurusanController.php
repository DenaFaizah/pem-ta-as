<?php

namespace App\Http\Controllers;

use App\Models\Jurusan; 
use Illuminate\Http\Request;

class JurusanController extends Controller
{
        /**
         * Display a listing of the resource.
         */
    public function index()
    {
        $jurusans = Jurusan::paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create'); // Menghapus $id karena tidak diperlukan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'  
        ]);

        $jurusan = new Jurusan();
        $jurusan->nama = $request->nama;
        $jurusan->save(); 

        // Redirect ke halaman daftar jurusan setelah berhasil disimpan
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementasi untuk menampilkan jurusan tertentu jika diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required'  
        ]);

        $jurusan = Jurusan::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan
        $jurusan->nama = $request->nama;
        $jurusan->save();

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui');
    }

/**
 * Remove the specified resource from storage.
 */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id); // Pastikan menggunakan huruf kapital
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}