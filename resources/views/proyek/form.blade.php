<div class="form-group mb-3">
    <label for="kode_proyek">Kode Proyek</label>
    <input type="text" class="form-control @error('kode_proyek') is-invalid @enderror"
           id="kode_proyek" name="kode_proyek"
           value="{{ old('kode_proyek', $proyek->kode_proyek ?? '') }}">
    @error('kode_proyek')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="nama_proyek">Nama Proyek</label>
    <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror"
           id="nama_proyek" name="nama_proyek"
           value="{{ old('nama_proyek', $proyek->nama_proyek ?? '') }}">
    @error('nama_proyek')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tahun">Tahun</label>
    <input type="number" class="form-control @error('tahun') is-invalid @enderror"
           id="tahun" name="tahun"
           value="{{ old('tahun', $proyek->tahun ?? '') }}">
    @error('tahun')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="lokasi">Lokasi</label>
    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
           id="lokasi" name="lokasi"
           value="{{ old('lokasi', $proyek->lokasi ?? '') }}">
    @error('lokasi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="anggaran">Anggaran (Rp)</label>
    <input type="number" class="form-control @error('anggaran') is-invalid @enderror"
           id="anggaran" name="anggaran"
           value="{{ old('anggaran', $proyek->anggaran ?? '') }}">
    @error('anggaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="sumber_dana">Sumber Dana</label>
    <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror"
           id="sumber_dana" name="sumber_dana"
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
