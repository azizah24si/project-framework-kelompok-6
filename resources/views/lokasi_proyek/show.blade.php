@extends('layouts.app')

@section('title', 'Project Location Detail')

@section('content_header')
    <h1>Project Location Detail</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Proyek</th>
                    <td>{{ $lokasi_proyek->proyek->nama_proyek ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td>{{ $lokasi_proyek->lat }}</td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td>{{ $lokasi_proyek->lng }}</td>
                </tr>
                <tr>
                    <th>GeoJSON</th>
                    <td>
                        @if ($lokasi_proyek->geojson)
                            <code>{{ json_encode($lokasi_proyek->geojson) }}</code>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            </table>
            <a href="{{ route('lokasi_proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('lokasi_proyek.edit', $lokasi_proyek) }}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
    </div>

    <!-- Gambar Lokasi -->
    @if($lokasi_proyek->media->count() > 0)
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title mb-0">
                <i class="fa fa-camera"></i> Gambar
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($lokasi_proyek->media as $media)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ Storage::url($media->file_path) }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body p-2">
                                <small class="text-muted">{{ $media->original_name }}</small>
                                <div class="btn-group w-100 mt-2">
                                    <a href="{{ Storage::url($media->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="fa fa-eye"></i> Lihat
                                    </a>
                                    <form action="{{ route('lokasi_proyek.media.destroy', $media->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')" class="d-inline">
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
    </div>
    @else
    <div class="card mt-4">
        <div class="card-body text-center">
            <i class="fa fa-camera fa-3x text-muted mb-3"></i>
            <p class="text-muted">Belum ada gambar yang diunggah untuk lokasi ini.</p>
        </div>
    </div>
    @endif
@stop






