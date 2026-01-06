<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\ProyekFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyek::with('files');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_proyek', 'like', "%{$search}%")
                  ->orWhere('nama_proyek', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('sumber_dana', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('sumber_dana')) {
            $query->where('sumber_dana', $request->sumber_dana);
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'like', "%{$request->lokasi}%");
        }

        $tahunList = Proyek::distinct()->orderBy('tahun', 'desc')->pluck('tahun');
        $sumberDanaList = Proyek::distinct()->orderBy('sumber_dana')->pluck('sumber_dana');
        $lokasiList = Proyek::distinct()->orderBy('lokasi')->pluck('lokasi');

        $proyeks = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $items = $proyeks;

        return view('proyek.index', compact(
            'items',
            'proyeks',
            'tahunList',
            'sumberDanaList',
            'lokasiList'
        ));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'anggaran' => str_replace('.', '', $request->anggaran)
        ]);

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

    public function show(Proyek $proyek)
    {
        $proyek->load('files');
        return view('proyek.show', compact('proyek'));
    }

    public function edit(Proyek $proyek)
    {
        $proyek->load('files');
        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, Proyek $proyek)
    {
        $request->merge([
            'anggaran' => str_replace('.', '', $request->anggaran)
        ]);

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

        $proyek->update($validated);
        $this->handleAttachmentUpload($request->file('dokumen_proyek'), $proyek);

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }

    public function storeFiles(Request $request, Proyek $proyek)
    {
        $request->validate([
            'dokumen_proyek' => 'required|array',
            'dokumen_proyek.*' => 'file|max:5120|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,zip',
        ]);

        $this->handleAttachmentUpload($request->file('dokumen_proyek'), $proyek);

        return back()->with('success', 'Dokumen berhasil diunggah.');
    }

    public function destroyFile(string $fileId)
    {
        $file = ProyekFile::findOrFail($fileId);

        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }

    private function handleAttachmentUpload(?array $files, Proyek $proyek): void
    {
        if (empty($files)) {
            return;
        }

        foreach ($files as $file) {
            $path = $file->store("proyek-files/{$proyek->proyek_id}", 'public');

            $proyek->files()->create([
                'file_path'     => $path,
                'original_name' => $file->getClientOriginalName(),
                'mime_type'     => $file->getClientMimeType(),
                'file_size'     => $file->getSize(),
            ]);
        }
    }
}
