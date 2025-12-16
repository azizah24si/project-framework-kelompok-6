@extends('layouts.app')

@section('title', 'Edit Project Progress')

@section('content_header')
    <h1>Edit Project Progress</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('progres_proyek.update', $item) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group col-md-6">
                        <label>Tahap</label>
                        <select name="tahap_id" class="form-control" required>
                            <option value="">-- Pilih Tahap --</option>
                            @foreach ($tahapans as $tahap)
                                <option value="{{ $tahap->tahap_id }}" @selected(old('tahap_id', $item->tahap_id) == $tahap->tahap_id)>
                                    {{ $tahap->nama_tahap }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Persen Real (%)</label>
                        <input type="number" step="0.01" min="0" max="100" name="persen_real" value="{{ old('persen_real', $item->persen_real) }}" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $item->tanggal) }}" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Catatan</label>
                        <input type="text" name="catatan" value="{{ old('catatan', $item->catatan) }}" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="foto_progres" class="form-label">
                        <i class="fa fa-camera"></i> Foto Progres
                    </label>
                    <input type="file" class="form-control @error('foto_progres.*') is-invalid @enderror"
                           id="foto_progres" name="foto_progres[]" multiple
                           accept=".jpg,.jpeg,.png,.gif">
                    <small class="text-muted">Upload foto progres (JPG, PNG, GIF) maksimal 5MB per file.</small>
                    @error('foto_progres.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                @if($item->photos->count() > 0)
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa fa-camera"></i> Foto Progres Saat Ini
                    </label>
                    <div class="row">
                        @foreach($item->photos as $photo)
                            <div class="col-6 col-md-3 mb-2">
                                <div class="card">
                                    <img src="{{ Storage::url($photo->file_path) }}" class="card-img-top" style="height: 100px; object-fit: cover;">
                                    <div class="card-body p-2">
                                        <small class="text-muted">{{ Str::limit($photo->original_name, 15) }}</small>
                                        <div class="btn-group w-100 mt-1">
                                            <a href="{{ Storage::url($photo->file_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="fa fa-eye"></i>
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
                </div>
                @endif
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('progres_proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
@stop


