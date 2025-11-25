@extends('layouts.poseify')

@section('title', 'Data Proyek')

@push('styles')
<style>
    .project-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    .project-card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 20px;
    }
    .project-card-body {
        padding: 20px;
    }
    .project-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    .project-info-item:last-child {
        border-bottom: none;
    }
    .project-info-item i {
        color: #667eea;
        width: 25px;
        margin-right: 10px;
    }
    .project-info-label {
        font-weight: 600;
        min-width: 120px;
        color: #666;
    }
    .project-info-value {
        color: #333;
    }
    .search-filter-section {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 30px;
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
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white mb-0">Data Proyek</h1>
                <p class="text-white-50">Sistem Manajemen Proyek Pembangunan</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container py-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h4 class="mb-0"><i class="fa fa-filter me-2"></i>Filter & Pencarian</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Proyek Baru
                </a>
            </div>
        </div>
        <form action="{{ route('proyek.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Cari Proyek</label>
                    <input type="text" name="search" class="form-control" placeholder="Nama atau Kode Proyek..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Filter Tahun</label>
                    <select name="tahun" class="form-control">
                        <option value="">Semua Tahun</option>
                        @foreach($tahuns as $t)
                            <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Filter Sumber Dana</label>
                    <select name="sumber_dana" class="form-control">
                        <option value="">Semua Sumber Dana</option>
                        @foreach($sumberDanas as $sd)
                            <option value="{{ $sd }}" {{ request('sumber_dana') == $sd ? 'selected' : '' }}>{{ $sd }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-secondary w-100">
                        <i class="fa fa-search me-2"></i>Cari
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Project Cards Grid -->
    <div class="row">
        @forelse ($proyeks as $item)
            <div class="col-lg-6">
                <div class="project-card">
                    <div class="project-card-header">
                        <h5 class="mb-1">{{ $item->nama_proyek }}</h5>
                        <p class="mb-0 opacity-75"><i class="fa fa-code me-2"></i>{{ $item->kode_proyek }}</p>
                    </div>
                    <div class="project-card-body">
                        <div class="project-info-item">
                            <i class="fa fa-calendar"></i>
                            <span class="project-info-label">Tahun</span>
                            <span class="project-info-value">{{ $item->tahun }}</span>
                        </div>
                        <div class="project-info-item">
                            <i class="fa fa-map-marker-alt"></i>
                            <span class="project-info-label">Lokasi</span>
                            <span class="project-info-value">{{ $item->lokasi }}</span>
                        </div>
                        <div class="project-info-item">
                            <i class="fa fa-money-bill-wave"></i>
                            <span class="project-info-label">Anggaran</span>
                            <span class="project-info-value">Rp {{ number_format($item->anggaran, 0, ',', '.') }}</span>
                        </div>
                        <div class="project-info-item">
                            <i class="fa fa-university"></i>
                            <span class="project-info-label">Sumber Dana</span>
                            <span class="project-info-value">{{ $item->sumber_dana }}</span>
                        </div>
                        <div class="project-info-item">
                            <i class="fa fa-info-circle"></i>
                            <span class="project-info-label">Deskripsi</span>
                            <span class="project-info-value">{{ Str::limit($item->deskripsi, 80) }}</span>
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('proyek.show', $item->proyek_id) }}" class="btn btn-info btn-sm flex-fill">
                                <i class="fa fa-eye me-1"></i>Detail
                            </a>
                            <a href="{{ route('proyek.edit', $item->proyek_id) }}" class="btn btn-warning btn-sm flex-fill">
                                <i class="fa fa-edit me-1"></i>Edit
                            </a>
                            <form action="{{ route('proyek.destroy', $item->proyek_id) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                    <i class="fa fa-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fa fa-info-circle me-2"></i>Tidak ada data proyek ditemukan.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($proyeks->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $proyeks->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
