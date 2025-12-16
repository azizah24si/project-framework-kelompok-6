@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content_header')
    <h1>Detail Proyek</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Proyek</th>
                    <td>{{ $proyek->kode_proyek }}</td>
                </tr>
                <tr>
                    <th>Nama Proyek</th>
                    <td>{{ $proyek->nama_proyek }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>{{ $proyek->tahun }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $proyek->lokasi }}</td>
                </tr>
                <tr>
                    <th>Anggaran</th>
                    <td>Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Sumber Dana</th>
                    <td>{{ $proyek->sumber_dana }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $proyek->deskripsi }}</td>
                </tr>
            </table>
            <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    @php
        $photos = $proyek->files->filter(function($file) {
            return in_array(strtolower(pathinfo($file->original_name, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']);
        });
    @endphp

    <!-- Foto Proyek -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title mb-0">
                <i class="fa fa-camera"></i> Foto Proyek
            </h3>
        </div>
        <div class="card-body">
            @if ($photos->isEmpty())
                <p class="text-muted mb-3">Belum ada foto yang diunggah.</p>
            @else
                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card">
                                <img src="{{ Storage::url($photo->file_path) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <small class="text-muted">{{ $photo->original_name }}</small>
                                    <div class="btn-group w-100 mt-2">
                                        <a href="{{ Storage::url($photo->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="fa fa-eye"></i> Lihat
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
            @endif

            <!-- Form Upload Foto -->
            <form action="{{ route('proyek.files.store', $proyek->proyek_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="foto_upload" class="form-label">
                        <i class="fa fa-camera"></i> Tambah Foto
                    </label>
                    <input type="file" class="form-control @error('dokumen_proyek.*') is-invalid @enderror"
                           id="foto_upload" name="dokumen_proyek[]" multiple
                           accept=".jpg,.jpeg,.png,.gif">
                    <small class="text-muted">Upload foto (JPG, PNG, GIF) maksimal 5MB per file.</small>
                    @error('dokumen_proyek')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @error('dokumen_proyek.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-upload"></i> Upload Foto
                </button>
            </form>
        </div>
    </div>
@stop
