<?php

namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\LokasiMedia;
use App\Models\Proyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class LokasiProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = LokasiProyek::with(['proyek', 'media'])->latest()->paginate(10);

        return view('lokasi_proyek.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $proyeks = Proyek::orderBy('nama_proyek')->get();

        return view('lokasi_proyek.create', compact('proyeks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat'       => 'required|numeric|between:-90,90',
            'lng'       => 'required|numeric|between:-180,180',
            'geojson'   => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'file|max:5120|mimes:jpg,jpeg,png,gif',
        ]);

        $lokasi = LokasiProyek::create($validated);
        
        // Handle media upload
        $this->handleMediaUpload($lokasi);

        return redirect()->route('lokasi_proyek.index')->with('success', 'Lokasi proyek berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LokasiProyek $lokasi_proyek): View
    {
        $lokasi_proyek->load('media');
        $proyeks = Proyek::orderBy('nama_proyek')->get();

        return view('lokasi_proyek.edit', [
            'item' => $lokasi_proyek,
            'proyeks' => $proyeks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LokasiProyek $lokasi_proyek): RedirectResponse
    {
        $validated = request()->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat'       => 'required|numeric|between:-90,90',
            'lng'       => 'required|numeric|between:-180,180',
            'geojson'   => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'file|max:5120|mimes:jpg,jpeg,png,gif',
        ]);

        $lokasi_proyek->update($validated);
        
        // Handle media upload
        $this->handleMediaUpload($lokasi_proyek);

        return redirect()->route('lokasi_proyek.index')->with('success', 'Lokasi proyek berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LokasiProyek $lokasi_proyek): View
    {
        $lokasi_proyek->load(['proyek', 'media']);

        return view('lokasi_proyek.show', compact('lokasi_proyek'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LokasiProyek $lokasi_proyek): RedirectResponse
    {
        // Delete media files first
        foreach ($lokasi_proyek->media as $media) {
            if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
        }
        
        $lokasi_proyek->delete();

        return redirect()->route('lokasi_proyek.index')->with('success', 'Lokasi proyek berhasil dihapus.');
    }

    public function destroyMedia(LokasiMedia $media): RedirectResponse
    {
        if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return redirect()->back()->with('success', 'Media berhasil dihapus.');
    }

    private function handleMediaUpload(LokasiProyek $lokasi): void
    {
        if (request()->hasFile('gambar')) {
            foreach (request()->file('gambar') as $file) {
                $storedPath = $file->store("lokasi-media/{$lokasi->lokasi_id}/gambar", 'public');

                $lokasi->media()->create([
                    'file_path' => $storedPath,
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                    'media_type' => 'gambar',
                ]);
            }
        }
    }
}


