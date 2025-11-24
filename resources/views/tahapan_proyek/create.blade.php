@extends('adminlte::page')

@section('title', 'Tambah Tahapan Proyek')

@section('content_header')
    <h1>Tambah Tahapan Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tahapan_proyek.store') }}" method="POST">
                @csrf

                @include('tahapan_proyek.form')

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="{{ route('tahapan_proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@stop
