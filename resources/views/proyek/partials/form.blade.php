<div class="mb-3">
    <label for="kode_proyek" class="form-label">Kode Proyek</label>
    <input type="text" class="form-control" id="kode_proyek" name="kode_proyek"
        value="{{ old('kode_proyek', $proyek->kode_proyek ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="nama_proyek" class="form-label">Nama Proyek</label>
    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek"
        value="{{ old('nama_proyek', $proyek->nama_proyek ?? '') }}" required>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun"
                value="{{ old('tahun', $proyek->tahun ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="sumber_dana" class="form-label">Sumber Dana</label>
            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana"
                value="{{ old('sumber_dana', $proyek->sumber_dana ?? '') }}" required>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text" class="form-control" id="lokasi" name="lokasi"
        value="{{ old('lokasi', $proyek->lokasi ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="anggaran" class="form-label">Anggaran</label>
    <input type="number" class="form-control" id="anggaran" name="anggaran"
        value="{{ old('anggaran', $proyek->anggaran ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $proyek->deskripsi ?? '') }}</textarea>
</div>
