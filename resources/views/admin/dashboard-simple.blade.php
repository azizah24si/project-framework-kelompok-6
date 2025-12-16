@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-1" style="font-weight: 700; color: #1e293b;">Dashboard</h1>
            <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->name }}!</p>
        </div>
        <div>
            <span class="badge badge-success px-3 py-2" style="font-size: 12px;">
                <i class="fas fa-check-circle mr-1"></i>
                Registrasi Berhasil
            </span>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" style="border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); color: white; border-radius: 12px 12px 0 0;">
                    <h3 class="card-title" style="font-weight: 600;">
                        <i class="fas fa-home mr-2"></i>
                        Selamat Datang di Sistem Manajemen Proyek
                    </h3>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                     style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 4px solid #e5e7eb;">
                            @else
                                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 32px; margin: 0 auto;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <h4 style="color: #1e293b; font-weight: 600;">{{ Auth::user()->name }}</h4>
                        <p style="color: #64748b;">{{ Auth::user()->email }}</p>
                        <p style="color: #10b981; font-weight: 500;">
                            <i class="fas fa-user-shield mr-1"></i>
                            {{ Auth::user()->role ?? 'User' }}
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3" style="background: #f8fafc; border-radius: 8px;">
                                <i class="fas fa-project-diagram fa-2x mb-2" style="color: #3b82f6;"></i>
                                <h5 style="color: #1e293b;">Proyek</h5>
                                <p class="text-muted mb-0">{{ $stats['proyek'] ?? 0 }} Total</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3" style="background: #f8fafc; border-radius: 8px;">
                                <i class="fas fa-users fa-2x mb-2" style="color: #10b981;"></i>
                                <h5 style="color: #1e293b;">Users</h5>
                                <p class="text-muted mb-0">{{ $stats['users'] ?? 0 }} Total</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3" style="background: #f8fafc; border-radius: 8px;">
                                <i class="fas fa-tasks fa-2x mb-2" style="color: #8b5cf6;"></i>
                                <h5 style="color: #1e293b;">Tahapan</h5>
                                <p class="text-muted mb-0">{{ $stats['tahapan'] ?? 0 }} Total</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p style="color: #64748b;">
                            Sistem berhasil diinisialisasi. Anda dapat mulai mengelola proyek Anda.
                        </p>
                        <div class="mt-3">
                            <a href="{{ route('profile.show') }}" class="btn btn-primary mr-2" style="border-radius: 8px;">
                                <i class="fas fa-user mr-1"></i>
                                Lihat Profil
                            </a>
                            <a href="{{ route('proyek.index') }}" class="btn btn-success" style="border-radius: 8px;">
                                <i class="fas fa-project-diagram mr-1"></i>
                                Kelola Proyek
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop