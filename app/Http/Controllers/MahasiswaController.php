<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Fetch mahasiswa data with pagination
            $mahasiswas = Mahasiswa::paginate(10);

            // Use a different view based on the user's role
            $viewPath = $user->role === 'operator' 
                ? 'operator.mahasiswa.index' 
                : 'admin.mahasiswa.index';

            return view($viewPath, compact('mahasiswas'));
        }

        // If the user is not authorized
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Ambil data jurusan dari database
            $jurusans = Jurusan::all();

            // Pilih view berdasarkan role pengguna
            $viewPath = $user->role === 'operator' 
                ? 'operator.mahasiswa.create' 
                : 'admin.mahasiswa.create';

            return view($viewPath, compact('jurusans'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Validation
            $request->validate([
                'nim' => 'required|unique:mahasiswas,nim',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:mahasiswas,email',
                'jurusan_id' => 'required|exists:jurusans,id',
                'no_hp' => 'required|string|max:15',
            ]);

            // Store the data
            Mahasiswa::create($request->all());

            return redirect()->route($user->role . '.mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Fetch specific mahasiswa data
            $mahasiswa = Mahasiswa::findOrFail($id);

            // Use a different view based on the user's role
            $viewPath = $user->role === 'operator' 
                ? 'operator.mahasiswa.show' 
                : 'admin.mahasiswa.show';

            return view($viewPath, compact('mahasiswa'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Ambil data mahasiswa berdasarkan ID
            $mahasiswa = Mahasiswa::findOrFail($id);

            // Ambil semua data jurusan dari database
            $jurusans = Jurusan::all();

            // Pilih view berdasarkan role pengguna
            $viewPath = $user->role === 'operator' 
                ? 'operator.mahasiswa.edit' 
                : 'admin.mahasiswa.edit';

            return view($viewPath, compact('mahasiswa', 'jurusans'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Validation
            $request->validate([
                'nim' => 'required|unique:mahasiswas,nim,' . $id,
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:mahasiswas,email,' . $id,
                'jurusan_id' => 'required|exists:jurusans,id',
                'no_hp' => 'required|string|max:15',
            ]);

            // Update the data
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->update($request->all());

            return redirect()->route($user->role . '.mahasiswa.index')->with('success', 'Data berhasil diperbarui.');
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            // Fetch and delete specific mahasiswa data
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->delete();

            return redirect()->route($user->role . '.mahasiswa.index')->with('success', 'Data berhasil dihapus.');
        }

        abort(403, 'Unauthorized action.');
    }
}
