@extends('layouts.poseify')

@section('title', 'Detail Proyek')

@push('styles')
<style>
    .detail-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .detail-card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 30px;
    }
    .detail-card-body {
        padding: 30px;
    }
    .detail-item {
        display: flex;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .detail-item:last-child {
        border-bottom: none;
    }
    .detail-label {
        font-weight: 600;
        min-width: 150px;
        color: #666;
        display: flex;
        align-items: center;
    }
    .detail-label i {
        color: #667eea;
        width: 25px;
        margin-right: 10px;
    }
    .detail-value {
        color: #333;
        flex: 1;
    }
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 60px 0;
        margin-bottom: 40px;
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 text-white mb-2">
                    <i class="fa fa-eye me-2"></i>Detail Proyek
                </h1>
                <p class="text-white-50 mb-0">Informasi lengkap proyek {{ $proyek->nama_proyek }}</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="detail-card">
                <div class="detail-card-header">
                    <h3 class="mb-1">{{ $proyek->nama_proyek }}</h3>
                    <p class="mb-0 opacity-75"><i class="fa fa-code me-2"></i>{{ $proyek->kode_proyek }}</p>
                </div>
                <div class="detail-card-body">
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fa fa-calendar"></i>
                            <span>Tahun</span>
                        </div>
                        <div class="detail-value">{{ $proyek->tahun }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fa fa-map-marker-alt"></i>
                            <span>Lokasi</span>
                        </div>
                        <div class="detail-value">{{ $proyek->lokasi }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fa fa-money-bill-wave"></i>
                            <span>Anggaran</span>
                        </div>
                        <div class="detail-value">Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fa fa-university"></i>
                            <span>Sumber Dana</span>
                        </div>
                        <div class="detail-value">{{ $proyek->sumber_dana }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fa fa-info-circle"></i>
                            <span>Deskripsi</span>
                        </div>
                        <div class="detail-value">{{ $proyek->deskripsi }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fa fa-file"></i>
                            <span>Dokumen</span>
                        </div>
                        <div class="detail-value">
                            @if($proyek->dokumen)
                                <a href="{{ asset('uploads/proyek/' . $proyek->dokumen) }}" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fa fa-download me-2"></i>Download Dokumen
                                </a>
                            @else
                                <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('proyek.index') }}" class="btn btn-secondary flex-fill">
                            <i class="fa fa-arrow-left me-2"></i>Kembali ke Daftar
                        </a>
                        <a href="{{ route('proyek.edit', $proyek->proyek_id) }}" class="btn btn-warning flex-fill">
                            <i class="fa fa-edit me-2"></i>Edit Proyek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
