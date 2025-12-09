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

    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Dokumen Proyek</h3>
        </div>
        <div class="card-body">
            @if ($proyek->files->isEmpty())
                <p class="text-muted mb-3">Belum ada dokumen yang diunggah.</p>
            @else
                <ul class="list-group mb-4">
                    @foreach ($proyek->files as $file)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $file->original_name }}</strong>
                                <div class="text-muted small">
                                    {{ number_format(($file->file_size ?? 0) / 1024, 1) }} KB
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ Storage::url($file->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    <i class="fa fa-download"></i> Lihat
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
            @endif

            <form action="{{ route('proyek.files.store', $proyek->proyek_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="detail_dokumen" class="form-label">Tambah Dokumen</label>
                    <input type="file" class="form-control @error('dokumen_proyek.*') is-invalid @enderror"
                           id="detail_dokumen" name="dokumen_proyek[]" multiple
                           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.zip">
                    <small class="text-muted">Pilih satu atau beberapa file (maks 5MB per file).</small>
                    @error('dokumen_proyek')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @error('dokumen_proyek.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-upload"></i> Unggah Dokumen
                </button>
            </form>
        </div>
    </div>
@stop
