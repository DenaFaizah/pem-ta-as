<?php

namespace App\Http\Controllers;

use App\Models\Tuakir;
use Illuminate\Http\Request;

class TuakirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tuakirs = Tuakir::paginate(10); // Fetch paginated data
        return view('tuakir.index', compact('tuakirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tuakir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ko_ta' => 'required',
            'judul_ta' => 'required' 
        ]);

        // Membuat instance baru dari model Jurusan dan menyimpan data
        $tuakir = new Tuakir();
        $tuakir->ko_ta = $request->ko_ta;
        $tuakir->judul_ta = $request->judul_ta;
        $tuakir->save(); // Menyimpan data ke database

        // Redirect ke halaman daftar tuki$tuakir setelah berhasil disimpan
        return redirect()->route('tuakir.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tuakir = Tuakir::find($id); 
        return view('tuakir.edit', compact('tuakirs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tuakir = Tuakir::find($id); // Corrected: Use 'Jurusan' with a capital 'J'
        $tuakir->ko_ta = $request->ko_ta;
        $tuakir->judul_ta = $request->judul_ta;
        $tuakir->save();
        return redirect()->route('tuakir.index')->with('success', 'Tugas Akhi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tuakir = Tuakir::findOrFail($id);
        $tuakir->delete();

        return redirect()->route('tuakir.index')->with('success', 'Data berhasil dihapus'); 
    }
}
