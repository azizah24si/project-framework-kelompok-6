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

        $proyeks = $query->paginate(5);

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
            'kode_proyek' => 'required|string|max:50|unique:proyek,kode_proyek',
            'nama_proyek' => 'required|string|max:255',
            'tahun'       => 'required|integer|min:1900|max:2155',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'required|numeric|min:0',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'dokumen'     => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/proyek'), $filename);
            $data['dokumen'] = $filename;
        }

        Proyek::create($data);

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
        $proyek = Proyek::findOrFail($id);

        $request->validate([
            'kode_proyek' => 'required|string|max:50|unique:proyek,kode_proyek,' . $id . ',proyek_id',
            'nama_proyek' => 'required|string|max:255',
            'tahun'       => 'required|integer|min:1900|max:2155',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'required|numeric|min:0',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'dokumen'     => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            // Delete old file if exists
            if ($proyek->dokumen && file_exists(public_path('uploads/proyek/' . $proyek->dokumen))) {
                unlink(public_path('uploads/proyek/' . $proyek->dokumen));
            }

            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/proyek'), $filename);
            $data['dokumen'] = $filename;
        }

        $proyek->update($data);

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
