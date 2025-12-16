@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Profil Saya</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Photo Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-camera"></i> Foto Profil
                    </h3>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($user->profile_photo_path)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" 
                                 class="img-circle" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #e5e7eb;">
                        @else
                            <div style="width: 150px; height: 150px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 48px; margin: 0 auto; border: 4px solid #e5e7eb;">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mb-2">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ $user->name }}">
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        
                        <div class="form-group">
                            <input type="file" name="profile_photo" class="form-control-file" accept="image/*" onchange="this.form.submit()">
                        </div>
                    </form>
                    
                    @if($user->profile_photo_path)
                        <form action="{{ route('profile.photo.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile photo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus Foto
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- User Info Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i> Info Akun
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Bergabung Sejak:</strong></td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Terakhir Diperbarui:</strong></td>
                            <td>{{ $user->updated_at->format('M d, Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Role:</strong></td>
                            <td>
                                <span class="badge badge-primary">
                                    {{ $user->role ?? 'User' }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Profile Information Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i> Informasi Profil
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Perbarui Profil
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </form>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-lock"></i> Ubah Password
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" name="current_password" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-key"></i> Update Password
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
<style>
    .img-circle {
        border-radius: 50%;
    }
    
    .card {
        margin-bottom: 20px;
    }
    
    .form-control-file {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.375rem 0.75rem;
    }
</style>
@endpush