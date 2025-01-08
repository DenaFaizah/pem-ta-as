<?php

namespace App\Http\Controllers;

use App\Models\Dosen; // Ensure you import the Dosen model
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::paginate(10);
        return view('admin.dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dosen.create'); // Return the view for creating a new Dosen
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        $dosen = new Dosen();
        $dosen ->fill($request->all());
        $dosen->save();

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan'); // Redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = Dosen::findOrFail($id); // Find the Dosen by ID
        return view('admin.dosen.show', compact('dosen')); // Return the view to show the Dosen details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id); // Find the Dosen by ID
        return view('admin.dosen.edit', compact('dosen')); // Return the view for editing the Dosen
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email' // Validate the input
        ]);

        $dosen = Dosen::findOrFail($id); // Find the Dosen by ID
        $dosen->fill($request->all()); // Update the name
        $dosen->save();

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diperbarui'); 
    }
}