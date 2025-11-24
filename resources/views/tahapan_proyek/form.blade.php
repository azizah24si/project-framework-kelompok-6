<div class="form-group mb-3">
    <label for="proyek_id">Proyek</label>
    <select class="form-control @error('proyek_id') is-invalid @enderror"
            id="proyek_id" name="proyek_id">
        <option value="">-- Pilih Proyek --</option>
        @foreach($proyeks as $proyek)
            <option value="{{ $proyek->proyek_id }}"
                {{ old('proyek_id', $tahapan->proyek_id ?? '') == $proyek->proyek_id ? 'selected' : '' }}>
                {{ $proyek->nama_proyek }}
            </option>
        @endforeach
    </select>
    @error('proyek_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="nama_tahap">Nama Tahap</label>
    <input type="text" class="form-control @error('nama_tahap') is-invalid @enderror"
           id="nama_tahap" name="nama_tahap"
           value="{{ old('nama_tahap', $tahapan->nama_tahap ?? '') }}">
    @error('nama_tahap')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="target_persen">Target Persentase (%)</label>
    <input type="number" class="form-control @error('target_persen') is-invalid @enderror"
           id="target_persen" name="target_persen"
           value="{{ old('target_persen', $tahapan->target_persen ?? '') }}">
    @error('target_persen')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tgl_mulai">Tanggal Mulai</label>
    <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror"
           id="tgl_mulai" name="tgl_mulai"
           value="{{ old('tgl_mulai', $tahapan->tgl_mulai ?? '') }}">
    @error('tgl_mulai')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tgl_selesai">Tanggal Selesai</label>
    <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror"
           id="tgl_selesai" name="tgl_selesai"
           value="{{ old('tgl_selesai', $tahapan->tgl_selesai ?? '') }}">
    @error('tgl_selesai')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
