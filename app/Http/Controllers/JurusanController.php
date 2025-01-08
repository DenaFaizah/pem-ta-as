<?php

namespace App\Http\Controllers;

use App\Models\Jurusan; // Corrected: Use 'Jurusan' with a capital 'J'
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::paginate(10); // Corrected: Use 'Jurusan' with a capital 'J'
        return view('admin.jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required'  // Pastikan field 'nama' wajib diisi
        ]);

        // Membuat instance baru dari model Jurusan dan menyimpan data
        $jurusan = new Jurusan();
        $jurusan->nama = $request->nama;
        $jurusan->save(); // Menyimpan data ke database

        // Redirect ke halaman daftar jurusan setelah berhasil disimpan
        return redirect()->route('admin.jurusan.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::findOrFail($id); // Find the Dosen by ID
        return view('admin.jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::find($id); // Corrected: Use 'Jurusan' with a capital 'J'
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusans = Jurusan::find($id); // Corrected: Use 'Jurusan' with a capital 'J'
        $jurusans->nama = $request->nama;
        $jurusans->save();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusans = jurusan::findOrFail($id); // Corrected: Use 'Jurusan' with a capital 'J'
        $jurusans->delete(); // Hapus data jurusans dari database
        // Redirect kembali ke halaman daftar jurusans dengan pesan sukses
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
