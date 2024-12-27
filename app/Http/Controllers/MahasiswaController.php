<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
{
    $mahasiswas = Mahasiswa::paginate(10); 
    return view('mahasiswa.index', compact('mahasiswas'));
}

    public function create()
    {
        
        return view('mahasiswa.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required', 
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required'
        ]);

        $mahasiswa = new Mahasiswa(); 
        $mahasiswa->fill($request->all()); 
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambah'); 
    }

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa')); 
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id); 
        return view('mahasiswa.edit', compact('mahasiswa')); 
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id); 
        $mahasiswa->fill($request->all()); 
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui'); 
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus'); 
    }
}