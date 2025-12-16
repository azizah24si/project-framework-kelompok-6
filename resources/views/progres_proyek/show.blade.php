@extends('layouts.app')

@section('title', 'Project Progress Detail')

@section('content_header')
    <h1>Project Progress Detail</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Proyek</th>
                    <td>{{ $progres_proyek->proyek->nama_proyek ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tahap</th>
                    <td>{{ $progres_proyek->tahap->nama_tahap ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Persen Real</th>
                    <td>{{ number_format($progres_proyek->persen_real, 2) }}%</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $progres_proyek->tanggal }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $progres_proyek->catatan ?? '-' }}</td>
                </tr>
            </table>
            <a href="{{ route('progres_proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('progres_proyek.edit', $progres_proyek) }}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
    </div>

    <!-- Foto Progres -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title mb-0">
                <i class="fa fa-camera"></i> Foto Progres
            </h3>
        </div>
        <div class="card-body">
            @if ($progres_proyek->photos->isEmpty())
                <p class="text-muted mb-3">Belum ada foto progres yang diunggah.</p>
            @else
                <div class="row">
                    @foreach ($progres_proyek->photos as $photo)
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card">
                                <img src="{{ Storage::url($photo->file_path) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <small class="text-muted">{{ $photo->original_name }}</small>
                                    <div class="btn-group w-100 mt-2">
                                        <a href="{{ Storage::url($photo->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="fa fa-eye"></i> Lihat
                                        </a>
                                        <form action="{{ route('progres_proyek.photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="d-inline">
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
        </div>
    </div>
@stop


