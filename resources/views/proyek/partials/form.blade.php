<div class="form-group mb-3">
    <label for="kode_proyek" class="form-label">Kode Proyek</label>
    <input type="text" class="form-control @error('kode_proyek') is-invalid @enderror"
           id="kode_proyek" name="kode_proyek"
           value="{{ old('kode_proyek', $proyek->kode_proyek ?? '') }}" required>
    @error('kode_proyek')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="nama_proyek" class="form-label">Nama Proyek</label>
    <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror"
           id="nama_proyek" name="nama_proyek"
           value="{{ old('nama_proyek', $proyek->nama_proyek ?? '') }}" required>
    @error('nama_proyek')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                   id="tahun" name="tahun"
                   value="{{ old('tahun', $proyek->tahun ?? '') }}" required>
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="sumber_dana" class="form-label">Sumber Dana</label>
            <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror"
                   id="sumber_dana" name="sumber_dana"
                   value="{{ old('sumber_dana', $proyek->sumber_dana ?? '') }}" required>
            @error('sumber_dana')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
           id="lokasi" name="lokasi"
           value="{{ old('lokasi', $proyek->lokasi ?? '') }}" required>
    @error('lokasi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="anggaran" class="form-label">Anggaran (Rp)</label>
    <input type="number" class="form-control @error('anggaran') is-invalid @enderror"
           id="anggaran" name="anggaran"
           value="{{ old('anggaran', $proyek->anggaran ?? '') }}" required>
    @error('anggaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
              id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $proyek->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="dokumen_proyek" class="form-label">Dokumen Pendukung</label>
    <input type="file" class="form-control @error('dokumen_proyek.*') is-invalid @enderror"
           id="dokumen_proyek" name="dokumen_proyek[]" multiple
           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.zip">
    <small class="text-muted">Unggah beberapa file (PDF, Office, gambar, ZIP) maksimal 5MB per file.</small>
    @error('dokumen_proyek')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    @error('dokumen_proyek.*')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

@php
    $hasAttachments = !empty($proyek) && $proyek->relationLoaded('files') && $proyek->files->isNotEmpty();
@endphp

@if($hasAttachments)
    <div class="mb-3">
        <label class="form-label">Dokumen Saat Ini</label>
        <ul class="list-group">
            @foreach($proyek->files as $file)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $file->original_name }}</strong>
                        <div class="text-muted small">
                            {{ number_format(($file->file_size ?? 0) / 1024, 1) }} KB
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ Storage::url($file->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                            <i class="fa fa-download"></i>
                        </a>
                        <form action="{{ route('proyek.files.destroy', $file->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
