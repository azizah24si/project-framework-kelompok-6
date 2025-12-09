@extends('layouts.app')

@section('title', 'Detail Tahapan Proyek')

@section('content_header')
    <h1>Detail Tahapan Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Tahap</th>
                    <td>{{ $tahapan->nama_tahap }}</td>
                </tr>
                <tr>
                    <th>Proyek</th>
                    <td>{{ $tahapan->proyek->nama_proyek ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Target Persentase</th>
                    <td>{{ $tahapan->target_persen }}%</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $tahapan->tgl_mulai }}</td>
                </tr>
                <tr>
                    <th>Tanggal Selesai</th>
                    <td>{{ $tahapan->tgl_selesai }}</td>
                </tr>
            </table>
            <a href="{{ route('tahapan_proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@stop
