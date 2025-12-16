@extends('layouts.app')

@section('title', 'Create Project Location')

@section('content_header')
    <h1>Create Project Location</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('lokasi_proyek.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Proyek</label>
                        <select name="proyek_id" class="form-control" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach ($proyeks as $proyek)
                                <option value="{{ $proyek->proyek_id }}" @selected(old('proyek_id') == $proyek->proyek_id)>
                                    {{ $proyek->nama_proyek }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Latitude</label>
                        <input type="number" step="0.0000001" name="lat" value="{{ old('lat') }}" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Longitude</label>
                        <input type="number" step="0.0000001" name="lng" value="{{ old('lng') }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>GeoJSON (opsional)</label>
                    <textarea name="geojson" rows="4" class="form-control" placeholder='{"type":"Point","coordinates":[lng,lat]'>{{ old('geojson') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="gambar" class="form-label">
                        <i class="fa fa-camera"></i> Gambar
                    </label>
                    <input type="file" class="form-control @error('gambar.*') is-invalid @enderror"
                           id="gambar" name="gambar[]" multiple
                           accept=".jpg,.jpeg,.png,.gif">
                    <small class="text-muted">Upload gambar lokasi (JPG, PNG, GIF)</small>
                    @error('gambar.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Create
                </button>
                <a href="{{ route('lokasi_proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
@stop


