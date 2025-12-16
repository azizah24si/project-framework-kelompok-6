@extends('layouts.app')

@section('title', 'Edit Project Location')

@section('content_header')
    <h1>Edit Project Location</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('lokasi_proyek.update', $item) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Proyek</label>
                        <select name="proyek_id" class="form-control" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach ($proyeks as $proyek)
                                <option value="{{ $proyek->proyek_id }}" @selected(old('proyek_id', $item->proyek_id) == $proyek->proyek_id)>
                                    {{ $proyek->nama_proyek }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Latitude</label>
                        <input type="number" step="0.0000001" name="lat" value="{{ old('lat', $item->lat) }}" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Longitude</label>
                        <input type="number" step="0.0000001" name="lng" value="{{ old('lng', $item->lng) }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>GeoJSON (opsional)</label>
                    <textarea name="geojson" rows="4" class="form-control" placeholder='{"type":"Point","coordinates":[lng,lat]'>{{ old('geojson', $item->geojson ? json_encode($item->geojson) : '') }}</textarea>
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

                @if($item->media->count() > 0)
                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <div class="row">
                        @foreach($item->media as $media)
                            <div class="col-md-3 mb-2">
                                <div class="card">
                                    <img src="{{ Storage::url($media->file_path) }}" class="card-img-top" style="height: 100px; object-fit: cover;">
                                    <div class="card-body p-2">
                                        <small class="text-muted">{{ Str::limit($media->original_name, 20) }}</small>
                                        <div class="btn-group w-100 mt-1">
                                            <a href="{{ Storage::url($media->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="fa fa-eye"></i>
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
                @endif
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('lokasi_proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
@stop


