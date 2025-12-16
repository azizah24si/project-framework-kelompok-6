<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\Proyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Kontraktor::with('proyek')->latest()->paginate(10);

        return view('kontraktor.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $proyeks = Proyek::orderBy('nama_proyek')->get();

        return view('kontraktor.create', compact('proyeks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'proyek_id'         => 'required|exists:proyek,proyek_id',
            'nama'              => 'required|string|max:150',
            'penanggung_jawab'  => 'nullable|string|max:150',
            'kontak'            => 'nullable|string|max:150',
            'alamat'            => 'nullable|string',
        ]);

        Kontraktor::create($validated);

        return redirect()->route('kontraktor.index')->with('success', 'Kontraktor berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontraktor $kontraktor): View
    {
        $proyeks = Proyek::orderBy('nama_proyek')->get();

        return view('kontraktor.edit', [
            'item' => $kontraktor,
            'proyeks' => $proyeks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Kontraktor $kontraktor): RedirectResponse
    {
        $validated = request()->validate([
            'proyek_id'         => 'required|exists:proyek,proyek_id',
            'nama'              => 'required|string|max:150',
            'penanggung_jawab'  => 'nullable|string|max:150',
            'kontak'            => 'nullable|string|max:150',
            'alamat'            => 'nullable|string',
        ]);

        $kontraktor->update($validated);

        return redirect()->route('kontraktor.index')->with('success', 'Kontraktor berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontraktor $kontraktor): View
    {
        $kontraktor->load('proyek');

        return view('kontraktor.show', compact('kontraktor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontraktor $kontraktor): RedirectResponse
    {
        $kontraktor->delete();

        return redirect()->route('kontraktor.index')->with('success', 'Kontraktor berhasil dihapus.');
    }
}


