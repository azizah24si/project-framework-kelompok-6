@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content_header')
    <h1>Edit Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proyek.update', $proyek->proyek_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('proyek.partials.form')

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@stop
