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
    <input type="text" class="form-control @error('anggaran') is-invalid @enderror"
           id="anggaran" name="anggaran"
           value="{{ old('anggaran', isset($proyek->anggaran) ? number_format($proyek->anggaran, 0, ',', '.') : '') }}"
           placeholder="Contoh: 7.000.000" required>
    <small class="text-muted">Masukkan angka tanpa "Rp" dan gunakan titik sebagai pemisah ribuan</small>
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
    <label for="foto_proyek" class="form-label">
        <i class="fa fa-camera"></i> Foto Proyek
    </label>
    <input type="file" class="form-control @error('dokumen_proyek.*') is-invalid @enderror"
           id="foto_proyek" name="dokumen_proyek[]" multiple
           accept=".jpg,.jpeg,.png,.gif">
    <small class="text-muted">Upload foto proyek (JPG, PNG, GIF) maksimal 5MB per file.</small>
    @error('dokumen_proyek.*')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

@php
    $hasAttachments = !empty($proyek) && $proyek->relationLoaded('files') && $proyek->files->isNotEmpty();
@endphp

@if($hasAttachments)
    @php
        $photos = $proyek->files->filter(function($file) {
            return in_array(strtolower(pathinfo($file->original_name, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']);
        });
    @endphp

    @if($photos->count() > 0)
    <div class="mb-3">
        <label class="form-label">
            <i class="fa fa-camera"></i> Foto Proyek Saat Ini
        </label>
        <div class="row">
            @foreach($photos as $photo)
                <div class="col-6 col-md-3 mb-2">
                    <div class="card">
                        <img src="{{ Storage::url($photo->file_path) }}" class="card-img-top" style="height: 100px; object-fit: cover;">
                        <div class="card-body p-2">
                            <small class="text-muted">{{ Str::limit($photo->original_name, 15) }}</small>
                            <div class="btn-group w-100 mt-1">
                                <a href="{{ Storage::url($photo->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('proyek.files.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const anggaranInput = document.getElementById('anggaran');
    
    if (!anggaranInput) {
        console.error('Anggaran input not found');
        return;
    }

    // Format input saat user mengetik
    anggaranInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, ''); // Hapus semua karakter non-digit

        if (value) {
            // Format dengan titik sebagai pemisah ribuan
            value = parseInt(value).toLocaleString('id-ID');
        }

        e.target.value = value;
    });

    // Sebelum form disubmit, ubah format kembali ke angka
    const form = anggaranInput.closest('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            console.log('Form submitting...');
            const rawValue = anggaranInput.value.replace(/\./g, ''); // Hapus titik
            anggaranInput.value = rawValue;
            console.log('Anggaran value:', rawValue);
            // Don't prevent default - let form submit
        });
    }
});
</script>
