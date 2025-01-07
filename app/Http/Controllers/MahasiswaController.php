<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
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
    $jurusans = Jurusan::all(); // Fetch all jurusans
    return view('mahasiswa.create', compact('jurusans'));
}

public function store(Request $request)
{
    $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'email' => 'required|email',
        'jurusan_id' => 'required|exists:jurusans,id', // Validasi jurusan_id
        'no_hp' => 'required',
    ]);

    $mahasiswa = new Mahasiswa();
    $mahasiswa->nim = $request->nim;
    $mahasiswa->nama = $request->nama;
    $mahasiswa->email = $request->email;
    $mahasiswa->jurusan_id = $request->jurusan_id; // Simpan jurusan_id
    $mahasiswa->no_hp = $request->no_hp;
    $mahasiswa->save();

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
}

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa')); 
    }

    public function edit($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id); // Ambil data mahasiswa berdasarkan ID
    $jurusans = Jurusan::all(); // Ambil semua jurusan

    return view('mahasiswa.edit', compact('mahasiswa', 'jurusans')); // Kirim data mahasiswa dan jurusan ke view
}

public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'nim' => 'required|string|max:20',
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:mahasiswas,email,' . $id,
        'jurusan_id' => 'required|exists:jurusans,id',
        'no_hp' => 'required|string|max:15',
    ]);

    // Temukan mahasiswa berdasarkan ID dan update
    $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->update($validatedData);

    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
}

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus'); 
    }
}