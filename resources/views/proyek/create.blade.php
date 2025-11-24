@extends('adminlte::page')

@section('title', 'Tambah Proyek')

@section('content_header')
    <h1>Tambah Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proyek.store') }}" method="POST">
                @csrf

                @include('proyek.form')

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Save
                </button>
                <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@stop
