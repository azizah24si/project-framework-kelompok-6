@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-1" style="font-weight: 700; color: #1e293b;">Dashboard</h1>
            <p class="text-muted mb-0">Selamat datang kembali, {{ Auth::user()->name }}! Berikut adalah ringkasan proyek Anda.</p>
        </div>
        <div>
            <span class="badge badge-info px-3 py-2" style="font-size: 12px;">
                <i class="fas fa-calendar-alt mr-1"></i>
                {{ now()->format('M d, Y') }}
            </span>
        </div>
    </div>
@stop

@section('content')
    <!-- Stats Cards Row -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="small-box" style="background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);">
                <div class="inner text-white">
                    <h3 style="font-weight: 700;">{{ $stats['proyek'] ?? 0 }}</h3>
                    <p style="font-weight: 500;">Total Proyek</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <a href="{{ route('proyek.index') }}" class="small-box-footer text-white" style="background: rgba(255,255,255,0.1);">
                    Lihat Proyek <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="small-box" style="background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%); border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(139, 92, 246, 0.3);">
                <div class="inner text-white">
                    <h3 style="font-weight: 700;">{{ $stats['tahapan'] ?? 0 }}</h3>
                    <p style="font-weight: 500;">Total Tahapan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <a href="{{ route('tahapan_proyek.index') }}" class="small-box-footer text-white" style="background: rgba(255,255,255,0.1);">
                    Lihat Tahapan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="small-box" style="background: linear-gradient(135deg, #34d399 0%, #10b981 100%); border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);">
                <div class="inner text-white">
                    <h3 style="font-weight: 700;">{{ $stats['users'] ?? 0 }}</h3>
                    <p style="font-weight: 500;">Total Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer text-white" style="background: rgba(255,255,255,0.1);">
                    Lihat Pengguna <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="small-box" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(245, 158, 11, 0.3);">
                <div class="inner text-white">
                    <h3 style="font-weight: 700;">{{ $stats['kontraktor'] ?? 0 }}</h3>
                    <p style="font-weight: 500;">Total Kontraktor</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hard-hat"></i>
                </div>
                <a href="{{ route('kontraktor.index') }}" class="small-box-footer text-white" style="background: rgba(255,255,255,0.1);">
                    Lihat Kontraktor <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Secondary Stats Row -->
    <div class="row mb-4">
        <div class="col-lg-6 col-12 mb-3">
            <a href="{{ route('progres_proyek.index') }}" style="text-decoration: none; color: inherit;">
                <div class="info-box" style="border-radius: 12px; border: none; transition: all 0.3s ease; cursor: pointer;">
                    <span class="info-box-icon" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #1e293b; border-radius: 12px 0 0 12px;">
                        <i class="fas fa-chart-line"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: 600; color: #1e293b;">Progress Proyek</span>
                        <span class="info-box-number" style="font-weight: 700; color: #3b82f6;">{{ $stats['progres'] ?? 0 }}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%; background: linear-gradient(90deg, #60a5fa 0%, #3b82f6 100%);"></div>
                        </div>
                        <span class="progress-description" style="color: #64748b;">
                            <i class="fas fa-arrow-circle-right text-primary"></i> Klik untuk melihat detail
                        </span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-12 mb-3">
            <a href="{{ route('lokasi_proyek.index') }}" style="text-decoration: none; color: inherit;">
                <div class="info-box" style="border-radius: 12px; border: none; transition: all 0.3s ease; cursor: pointer;">
                    <span class="info-box-icon" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: #1e293b; border-radius: 12px 0 0 12px;">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-weight: 600; color: #1e293b;">Lokasi Proyek</span>
                        <span class="info-box-number" style="font-weight: 700; color: #000000;">{{ $stats['lokasi'] ?? 0 }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 50%; background: linear-gradient(90deg, #fbbf24 0%, #f59e0b 100%);"></div>
                        </div>
                        <span class="progress-description" style="color: #64748b;">
                            <i class="fas fa-arrow-circle-right text-warning"></i> Klik untuk melihat detail
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Welcome Card & Quick Actions -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card" style="border-radius: 12px; border: none;">
                <div class="card-header" style="background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); color: white; border-radius: 12px 12px 0 0;">
                    <h3 class="card-title mb-0" style="font-weight: 600;">
                        <i class="fas fa-rocket mr-2"></i>
                        Selamat Datang di Dashboard Pembangunan
                    </h3>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    <div class="d-flex align-items-center mb-3">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                 style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 3px solid #e5e7eb; margin-right: 20px;">
                        @else
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 20px;">
                                <span style="color: white; font-weight: 700; font-size: 24px;">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div>
                            <h4 style="margin: 0; font-weight: 600; color: #1e293b;">Halo, {{ Auth::user()->name }}!</h4>
                            <p style="margin: 0; color: #64748b;">Siap mengelola proyek pembangunan Anda hari ini?</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6 style="font-weight: 600; color: #1e293b; margin-bottom: 15px;">Aksi Cepat</h6>
                            <div class="list-group list-group-flush">
                                <a href="{{ route('proyek.create') }}" class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-plus-circle text-primary mr-2"></i>
                                    Buat Proyek Baru
                                </a>
                                <a href="{{ route('tahapan_proyek.create') }}" class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-tasks text-success mr-2"></i>
                                    Tambah Tahapan Proyek
                                </a>
                                <a href="{{ route('users.create') }}" class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-user-plus text-info mr-2"></i>
                                    Tambah Pengguna Baru
                                </a>
                                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-users text-warning mr-2"></i>
                                    Lihat Pengguna
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 style="font-weight: 600; color: #1e293b; margin-bottom: 15px;">Status Sistem</h6>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge badge-success mr-2">●</span>
                                <span style="color: #64748b;">Semua Sistem Beroperasi</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge badge-success mr-2">●</span>
                                <span style="color: #64748b;">Database Terhubung</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-warning mr-2">●</span>
                                <span style="color: #64748b;">Backup Terjadwal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop



@push('css')
<style>
.info-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}
</style>
@endpush