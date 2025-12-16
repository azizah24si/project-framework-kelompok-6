@extends('layouts.app')

@section('title', 'Contractor Detail')

@section('content_header')
    <h1>Contractor Detail</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Proyek</th>
                    <td>{{ $kontraktor->proyek->nama_proyek ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $kontraktor->nama }}</td>
                </tr>
                <tr>
                    <th>Penanggung Jawab</th>
                    <td>{{ $kontraktor->penanggung_jawab ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kontak</th>
                    <td>{{ $kontraktor->kontak ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $kontraktor->alamat ?? '-' }}</td>
                </tr>
            </table>
            <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('kontraktor.edit', $kontraktor) }}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop


