<?php

namespace App\Http\Controllers;

use App\Models\ProgresProyek;
use App\Models\ProgresPhoto;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProgresProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = ProgresProyek::with(['proyek', 'tahap', 'photos'])->latest()->paginate(10);

        return view('progres_proyek.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $proyeks = Proyek::orderBy('nama_proyek')->get();
        $tahapans = TahapanProyek::orderBy('nama_tahap')->get();

        return view('progres_proyek.create', compact('proyeks', 'tahapans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'proyek_id'   => 'required|exists:proyek,proyek_id',
            'tahap_id'    => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string',
            'foto_progres' => 'nullable|array',
            'foto_progres.*' => 'file|max:5120|mimes:jpg,jpeg,png,gif',
        ]);

        $progres = ProgresProyek::create($validated);
        
        // Handle photo upload
        if (request()->hasFile('foto_progres')) {
            $this->handlePhotoUpload(request()->file('foto_progres'), $progres);
        }

        return redirect()->route('progres_proyek.index')->with('success', 'Progres proyek berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgresProyek $progres_proyek): View
    {
        $progres_proyek->load('photos');
        $proyeks = Proyek::orderBy('nama_proyek')->get();
        $tahapans = TahapanProyek::orderBy('nama_tahap')->get();

        return view('progres_proyek.edit', [
            'item' => $progres_proyek,
            'proyeks' => $proyeks,
            'tahapans' => $tahapans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgresProyek $progres_proyek): RedirectResponse
    {
        $validated = request()->validate([
            'proyek_id'   => 'required|exists:proyek,proyek_id',
            'tahap_id'    => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string',
            'foto_progres' => 'nullable|array',
            'foto_progres.*' => 'file|max:5120|mimes:jpg,jpeg,png,gif',
        ]);

        $progres_proyek->update($validated);
        
        // Handle photo upload
        if (request()->hasFile('foto_progres')) {
            $this->handlePhotoUpload(request()->file('foto_progres'), $progres_proyek);
        }

        return redirect()->route('progres_proyek.index')->with('success', 'Progres proyek berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgresProyek $progres_proyek): View
    {
        $progres_proyek->load(['proyek', 'tahap', 'photos']);

        return view('progres_proyek.show', compact('progres_proyek'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgresProyek $progres_proyek): RedirectResponse
    {
        // Delete photos first
        foreach ($progres_proyek->photos as $photo) {
            if ($photo->file_path && Storage::disk('public')->exists($photo->file_path)) {
                Storage::disk('public')->delete($photo->file_path);
            }
        }
        
        $progres_proyek->delete();

        return redirect()->route('progres_proyek.index')->with('success', 'Progres proyek berhasil dihapus.');
    }

    public function destroyPhoto(ProgresPhoto $photo): RedirectResponse
    {
        if ($photo->file_path && Storage::disk('public')->exists($photo->file_path)) {
            Storage::disk('public')->delete($photo->file_path);
        }

        $photo->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }

    private function handlePhotoUpload(?array $files, ProgresProyek $progres): void
    {
        if (empty($files)) {
            return;
        }

        foreach ($files as $file) {
            $storedPath = $file->store("progres-photos/{$progres->progres_id}", 'public');

            $progres->photos()->create([
                'file_path' => $storedPath,
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'file_size' => $file->getSize(),
            ]);
        }
    }
}


