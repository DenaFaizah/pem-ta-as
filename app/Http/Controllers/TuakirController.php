<?php

namespace App\Http\Controllers;

use App\Models\Tuakir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuakirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            $tuakirs = Tuakir::paginate(10);

            // Tampilkan view sesuai role
            $viewPath = $user->role === 'operator'
                ? 'operator.tuakir.index'
                : 'admin.tuakir.index';

            return view($viewPath, compact('tuakirs'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'operator'])) {
            $viewPath = $user->role === 'operator'
                ? 'operator.tuakir.create'
                : 'admin.tuakir.create';

            return view($viewPath);
        }

        abort(403, 'Unauthorized action.');
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

        if (in_array(Auth::user()->role, ['admin', 'operator'])) {
            $tuakir = new Tuakir();
            $tuakir->ko_ta = $request->ko_ta;
            $tuakir->judul_ta = $request->judul_ta;
            $tuakir->save();

            return redirect()->route('operator.tuakir.index')->with('success', 'Data berhasil ditambahkan');
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
            $tuakir = Tuakir::findOrFail($id);

            $viewPath = $user->role === 'operator'
                ? 'operator.tuakir.show'
                : 'admin.tuakir.show';

            return view($viewPath, compact('tuakir'));
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
            $tuakir = Tuakir::findOrFail($id);

            $viewPath = $user->role === 'operator'
                ? 'operator.tuakir.edit'
                : 'admin.tuakir.edit';

            return view($viewPath, compact('tuakir'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ko_ta' => 'required',
            'judul_ta' => 'required'
        ]);

        if (in_array(Auth::user()->role, ['admin', 'operator'])) {
            $tuakir = Tuakir::findOrFail($id);
            $tuakir->ko_ta = $request->ko_ta;
            $tuakir->judul_ta = $request->judul_ta;
            $tuakir->save();

            return redirect()->route('operator.tuakir.index')->with('success', 'Data berhasil diperbarui');
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (in_array(Auth::user()->role, ['admin', 'operator'])) {
            $tuakir = Tuakir::findOrFail($id);
            $tuakir->delete();

            return redirect()->route('operator.tuakir.index')->with('success', 'Data berhasil dihapus');
        }

        abort(403, 'Unauthorized action.');
    }
}
