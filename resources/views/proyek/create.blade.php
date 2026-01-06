@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content_header')
    <h1>Tambah Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proyek.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="kode_proyek" class="form-label">Kode Proyek</label>
                    <input type="text" class="form-control @error('kode_proyek') is-invalid @enderror"
                           id="kode_proyek" name="kode_proyek"
                           value="{{ old('kode_proyek') }}" required>
                    @error('kode_proyek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_proyek" class="form-label">Nama Proyek</label>
                    <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror"
                           id="nama_proyek" name="nama_proyek"
                           value="{{ old('nama_proyek') }}" required>
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
                                   value="{{ old('tahun') }}" required>
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
                                   value="{{ old('sumber_dana') }}" required>
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
                           value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="anggaran" class="form-label">Anggaran (Rp)</label>
                    <input type="number" class="form-control @error('anggaran') is-invalid @enderror"
                           id="anggaran" name="anggaran"
                           value="{{ old('anggaran') }}" required>
                    @error('anggaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                              id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
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

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@stop
