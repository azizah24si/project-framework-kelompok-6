@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Detail Pengguna</h1>
        <div>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit Pengguna
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Photo Card -->
            <div class="card" style="border-radius: 12px; border: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); color: white; border-radius: 12px 12px 0 0;">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-user"></i> Foto Profil
                    </h3>
                </div>
                <div class="card-body text-center" style="padding: 2rem;">
                    <div class="mb-3">
                        @if($user->profile_photo_path)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" 
                                 class="img-circle" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #e5e7eb;">
                        @else
                            <div style="width: 150px; height: 150px; background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 48px; margin: 0 auto; border: 4px solid #e5e7eb;">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <h4 style="color: #1e293b; font-weight: 600;">{{ $user->name }}</h4>
                    <p style="color: #64748b;">{{ $user->email }}</p>
                </div>
            </div>


        </div>

        <div class="col-md-8">
            <!-- User Information Card -->
            <div class="card" style="border-radius: 12px; border: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%); color: white; border-radius: 12px 12px 0 0;">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-info-circle"></i> Informasi Pengguna
                    </h3>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-4">
                                <label style="font-weight: 600; color: #374151; display: block; margin-bottom: 8px;">
                                    <i class="fas fa-user text-primary mr-2"></i>Nama Lengkap
                                </label>
                                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border-left: 4px solid #60a5fa;">
                                    {{ $user->name }}
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <label style="font-weight: 600; color: #374151; display: block; margin-bottom: 8px;">
                                    <i class="fas fa-envelope text-success mr-2"></i>Email
                                </label>
                                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border-left: 4px solid #10b981;">
                                    {{ $user->email }}
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <label style="font-weight: 600; color: #374151; display: block; margin-bottom: 8px;">
                                    <i class="fas fa-shield-alt text-warning mr-2"></i>Role
                                </label>
                                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border-left: 4px solid #f59e0b;">
                                    <span class="badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; padding: 6px 12px; border-radius: 6px;">
                                        {{ ucwords($user->role) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-item mb-4">
                                <label style="font-weight: 600; color: #374151; display: block; margin-bottom: 8px;">
                                    <i class="fas fa-calendar-plus text-info mr-2"></i>Bergabung Sejak
                                </label>
                                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border-left: 4px solid #06b6d4;">
                                    {{ $user->created_at->format('d F Y') }}
                                    <small class="d-block text-muted">{{ $user->created_at->diffForHumans() }}</small>
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <label style="font-weight: 600; color: #374151; display: block; margin-bottom: 8px;">
                                    <i class="fas fa-clock text-secondary mr-2"></i>Terakhir Diperbarui
                                </label>
                                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border-left: 4px solid #6b7280;">
                                    {{ $user->updated_at->format('d F Y H:i') }}
                                    <small class="d-block text-muted">{{ $user->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <label style="font-weight: 600; color: #374151; display: block; margin-bottom: 8px;">
                                    <i class="fas fa-key text-danger mr-2"></i>Status Akun
                                </label>
                                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border-left: 4px solid #10b981;">
                                    <span class="badge badge-success" style="background: #10b981; padding: 6px 12px; border-radius: 6px;">
                                        <i class="fas fa-check-circle mr-1"></i>Aktif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Timeline Card -->
            <div class="card mt-4" style="border-radius: 12px; border: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); color: white; border-radius: 12px 12px 0 0;">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-history"></i> Aktivitas Terbaru
                    </h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Akun Dibuat</h6>
                                <p class="timeline-text">Pengguna bergabung dengan sistem</p>
                                <small class="timeline-time text-muted">{{ $user->created_at->format('d F Y H:i') }}</small>
                            </div>
                        </div>
                        
                        @if($user->updated_at != $user->created_at)
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Profil Diperbarui</h6>
                                <p class="timeline-text">Informasi profil terakhir diperbarui</p>
                                <small class="timeline-time text-muted">{{ $user->updated_at->format('d F Y H:i') }}</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
<style>
.info-item {
    transition: all 0.3s ease;
}

.info-item:hover {
    transform: translateY(-2px);
}

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline:before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e5e7eb;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-marker {
    position: absolute;
    left: -37px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.timeline-content {
    background: #f8fafc;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #60a5fa;
}

.timeline-title {
    margin: 0 0 5px 0;
    font-weight: 600;
    color: #1e293b;
}

.timeline-text {
    margin: 0 0 5px 0;
    color: #64748b;
}

.timeline-time {
    font-size: 0.875rem;
}

.img-circle {
    border-radius: 50%;
}

.border-right {
    border-right: 1px solid #e5e7eb;
}
</style>
@endpush