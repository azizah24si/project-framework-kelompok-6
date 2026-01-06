<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;

class TahapanProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua tahapan proyek beserta relasi proyek-nya
        $tahapans = TahapanProyek::with('proyek')->paginate(10);
        return view('tahapan_proyek.index', compact('tahapans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyeks = Proyek::all();
        return view('tahapan_proyek.create', compact('proyeks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'     => 'required|exists:proyek,proyek_id',
            'nama_tahap'    => 'required|string|max:255',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai'     => 'required|date',
            'tgl_selesai'   => 'required|date|after_or_equal:tgl_mulai',
        ]);

        TahapanProyek::create($request->all());

        return redirect()->route('tahapan_proyek.index')
            ->with('success', 'Tahapan proyek berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TahapanProyek $tahapan_proyek)
    {
        $tahapan = $tahapan_proyek->load('proyek');
        return view('tahapan_proyek.show', compact('tahapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahapanProyek $tahapan_proyek)
    {
        $tahapan = $tahapan_proyek;
        $proyeks = Proyek::all();
        return view('tahapan_proyek.edit', compact('tahapan', 'proyeks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahapanProyek $tahapan_proyek)
    {
        $request->validate([
            'proyek_id'     => 'required|exists:proyek,proyek_id',
            'nama_tahap'    => 'required|string|max:255',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai'     => 'required|date',
            'tgl_selesai'   => 'required|date|after_or_equal:tgl_mulai',
        ]);

        $tahapan_proyek->update($request->all());

        return redirect()->route('tahapan_proyek.index')
            ->with('success', 'Tahapan proyek berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahapanProyek $tahapan_proyek)
    {
        $tahapan_proyek->delete();

        return redirect()->route('tahapan_proyek.index')
            ->with('success', 'Tahapan proyek berhasil dihapus.');
    }
}
