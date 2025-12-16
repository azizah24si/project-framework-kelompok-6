<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\ProyekFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Proyek::query()->with('files');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_proyek', 'like', "%{$search}%")
                  ->orWhere('nama_proyek', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('sumber_dana', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Filter by tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter by sumber_dana
        if ($request->filled('sumber_dana')) {
            $query->where('sumber_dana', $request->sumber_dana);
        }

        // Filter by lokasi
        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'like', "%{$request->lokasi}%");
        }

        // Get distinct values for filter dropdowns
        $tahunList = Proyek::distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        $sumberDanaList = Proyek::distinct()->orderBy('sumber_dana')->pluck('sumber_dana');
        $lokasiList = Proyek::distinct()->orderBy('lokasi')->pluck('lokasi');

        // Paginate with query parameters preserved
        $proyeks = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        $items = $proyeks; // Alias untuk konsistensi dengan view
        return view('proyek.index', compact('items', 'proyeks', 'tahunList', 'sumberDanaList', 'lokasiList'));
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
        $validated = $request->validate([
            'kode_proyek' => 'required|string|max:50',
            'nama_proyek' => 'required|string|max:255',
            'tahun'       => 'required|numeric',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'dokumen_proyek' => 'nullable|array',
            'dokumen_proyek.*' => 'file|max:5120|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,zip',
        ]);

        $proyek = Proyek::create($validated);
        $this->handleAttachmentUpload($request->file('dokumen_proyek'), $proyek);

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyek = Proyek::with('files')->findOrFail($id);
        return view('proyek.show', compact('proyek'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyek = Proyek::with('files')->findOrFail($id);
        return view('proyek.edit', compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_proyek' => 'required|string|max:50',
            'nama_proyek' => 'required|string|max:255',
            'tahun'       => 'required|numeric',
            'lokasi'      => 'required|string|max:255',
            'anggaran'    => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'dokumen_proyek' => 'nullable|array',
            'dokumen_proyek.*' => 'file|max:5120|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,zip',
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update($validated);
        $this->handleAttachmentUpload($request->file('dokumen_proyek'), $proyek);

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

    public function storeFiles(Request $request, string $proyekId)
    {
        $proyek = Proyek::findOrFail($proyekId);

        $request->validate([
            'dokumen_proyek' => 'required|array',
            'dokumen_proyek.*' => 'file|max:5120|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,zip',
        ]);

        $this->handleAttachmentUpload($request->file('dokumen_proyek'), $proyek);

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah.');
    }

    public function destroyFile(string $fileId)
    {
        $file = ProyekFile::findOrFail($fileId);

        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }

    private function handleAttachmentUpload(?array $files, Proyek $proyek): void
    {
        if (empty($files)) {
            return;
        }

        foreach ($files as $file) {
            $storedPath = $file->store("proyek-files/{$proyek->proyek_id}", 'public');

            $proyek->files()->create([
                'file_path' => $storedPath,
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'file_size' => $file->getSize(),
            ]);
        }
    }
}
