@extends('layouts.app')

@section('title', 'Edit Tahapan Proyek')

@section('content_header')
    <h1>Edit Tahapan Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tahapan_proyek.update', $tahapan) }}" method="POST">
                @csrf
                @method('PUT')

                @include('tahapan_proyek.form')

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('tahapan_proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@stop
