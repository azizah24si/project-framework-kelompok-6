@extends('layouts.app')

@section('title', 'Edit Contractor')

@section('content_header')
    <h1>Edit Contractor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kontraktor.update', $item) }}" method="POST">
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
                        <label>Nama Kontraktor</label>
                        <input type="text" name="nama" value="{{ old('nama', $item->nama) }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" value="{{ old('penanggung_jawab', $item->penanggung_jawab) }}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kontak</label>
                        <input type="text" name="kontak" value="{{ old('kontak', $item->kontak) }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control">{{ old('alamat', $item->alamat) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
@stop


