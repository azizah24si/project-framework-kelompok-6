<div class="form-group mb-3">
    <label for="kode_proyek">Kode Proyek <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('kode_proyek') is-invalid @enderror"
           id="kode_proyek" name="kode_proyek" required maxlength="50"
           value="{{ old('kode_proyek', $proyek->kode_proyek ?? '') }}">
    @error('kode_proyek')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="nama_proyek">Nama Proyek <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror"
           id="nama_proyek" name="nama_proyek" required maxlength="255"
           value="{{ old('nama_proyek', $proyek->nama_proyek ?? '') }}">
    @error('nama_proyek')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tahun">Tahun <span class="text-danger">*</span></label>
    <input type="number" class="form-control @error('tahun') is-invalid @enderror"
           id="tahun" name="tahun" min="1900" max="2155" required
           value="{{ old('tahun', $proyek->tahun ?? '') }}">
    <small class="form-text text-muted">Tahun harus antara 1900 - 2155</small>
    @error('tahun')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="lokasi">Lokasi <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
           id="lokasi" name="lokasi" required maxlength="255"
           value="{{ old('lokasi', $proyek->lokasi ?? '') }}">
    @error('lokasi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="anggaran">Anggaran (Rp) <span class="text-danger">*</span></label>
    <input type="number" class="form-control @error('anggaran') is-invalid @enderror"
           id="anggaran" name="anggaran" min="0" step="1" required
           value="{{ old('anggaran', $proyek->anggaran ?? '') }}">
    <small class="form-text text-muted">Masukkan anggaran dalam Rupiah (min: 0)</small>
    @error('anggaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="sumber_dana">Sumber Dana <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror"
           id="sumber_dana" name="sumber_dana" required maxlength="255"
           value="{{ old('sumber_dana', $proyek->sumber_dana ?? '') }}">
    @error('sumber_dana')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
              id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $proyek->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="dokumen">Dokumen Proyek</label>
    <input type="file" class="form-control @error('dokumen') is-invalid @enderror"
           id="dokumen" name="dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx">
    @if(isset($proyek->dokumen) && $proyek->dokumen)
        <small class="form-text text-muted">
            File saat ini: <a href="{{ asset('uploads/proyek/' . $proyek->dokumen) }}" target="_blank">{{ $proyek->dokumen }}</a>
        </small>
    @endif
    <small class="form-text text-muted">Format: PDF, DOC, DOCX, XLS, XLSX (Max: 2MB)</small>
    @error('dokumen')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
