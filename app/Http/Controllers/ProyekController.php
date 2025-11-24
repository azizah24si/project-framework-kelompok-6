<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Proyek::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_proyek', 'like', "%{$search}%")
                  ->orWhere('kode_proyek', 'like', "%{$search}%");
            });
        }

        // Filter Tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter Sumber Dana
        if ($request->filled('sumber_dana')) {
            $query->where('sumber_dana', $request->sumber_dana);
        }

        $proyeks = $query->paginate(10);

        // Get distinct values for filters
        $tahuns = Proyek::select('tahun')->distinct()->whereNotNull('tahun')->orderBy('tahun', 'desc')->pluck('tahun');
        $sumberDanas = Proyek::select('sumber_dana')->distinct()->whereNotNull('sumber_dana')->orderBy('sumber_dana')->pluck('sumber_dana');

        return view('proyek.index', compact('proyeks', 'tahuns', 'sumberDanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyek.create', ['proyek' => new Proyek()]);
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
