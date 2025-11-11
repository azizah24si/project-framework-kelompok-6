<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyeks = Proyek::paginate(10);
        return view('proyek.index', compact('proyeks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required|string|max:50',
            'nama_proyek' => 'required|string|max:255',
            'tahun'       => 'required|numeric',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.show', compact('proyek'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_proyek' => 'required|string|max:50',
            'nama_proyek' => 'required|string|max:255',
            'tahun'       => 'required|numeric',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update($request->all());

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }
}
