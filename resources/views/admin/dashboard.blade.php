@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $stats['proyek'] ?? 0 }}</h3>
                    <p>Total Proyek</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <a href="{{ route('proyek.index') }}" class="small-box-footer">
                    Lihat Proyek <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['tahapan'] ?? 0 }}</h3>
                    <p>Total Tahapan Proyek</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <a href="{{ route('tahapan_proyek.index') }}" class="small-box-footer">
                    Lihat Tahapan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['users'] ?? 0 }}</h3>
                    <p>Total User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">
                    Lihat User <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">Selamat datang</h3>
        </div>
        <div class="card-body">
            <p class="mb-1">Halo, {{ Auth::user()->name }}.</p>
            <p class="text-muted mb-0">Gunakan menu di kiri untuk mengelola proyek, tahapan, dan pengguna.</p>
        </div>
    </div>
@stop
