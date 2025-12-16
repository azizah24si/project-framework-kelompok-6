@extends('layouts.app')

@section('title', 'Create Contractor')

@section('content_header')
    <h1>Create Contractor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kontraktor.store') }}" method="POST">
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
                    <div class="form-group col-md-6">
                        <label>Nama Kontraktor</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kontak</label>
                        <input type="text" name="kontak" value="{{ old('kontak') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control">{{ old('alamat') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Create
                </button>
                <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
@stop


