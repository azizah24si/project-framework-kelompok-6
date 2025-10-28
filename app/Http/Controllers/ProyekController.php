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
        $data['dataProyek'] = Proyek::all();
        return view('admin.proyek.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['kode_proyek'] = $request->kode_proyek;
        $data['nama_proyek'] = $request->nama_proyek;
        $data['tahun']       = $request->tahun;
        $data['lokasi']      = $request->lokasi;
        $data['anggaran']    = $request->anggaran;
        $data['sumber_dana'] = $request->sumber_dana;
        $data['deskripsi']   = $request->deskripsi;

        Proyek::create($data);

        return redirect()->route('proyek.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataProyek'] = Proyek::findOrFail($id);
        return view('admin.proyek.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyek_id = $id;
        $proyek    = Proyek::findOrFail($proyek_id);

        $proyek->kode_proyek = $request->kode_proyek;
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->tahun       = $request->tahun;
        $proyek->lokasi      = $request->lokasi;
        $proyek->anggaran    = $request->anggaran;
        $proyek->sumber_dana = $request->sumber_dana;
        $proyek->deskripsi   = $request->deskripsi;

        $proyek->save();
        return redirect()->route('proyek.index')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyek = Proyek::findOrFail($id);

        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Data berhasil dihapus');
    }
}
