@extends('adminlte::page')

@section('title', 'Detail Proyek')

@section('content_header')
    <h1>Detail Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Proyek</th>
                    <td>{{ $proyek->kode_proyek }}</td>
                </tr>
                <tr>
                    <th>Nama Proyek</th>
                    <td>{{ $proyek->nama_proyek }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>{{ $proyek->tahun }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $proyek->lokasi }}</td>
                </tr>
                <tr>
                    <th>Anggaran</th>
                    <td>Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Sumber Dana</th>
                    <td>{{ $proyek->sumber_dana }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $proyek->deskripsi }}</td>
                </tr>
            </table>
            <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@stop
