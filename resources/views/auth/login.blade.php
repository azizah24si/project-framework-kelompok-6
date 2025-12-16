@extends('layouts.auth.app')

@section('content')
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500" style="border-radius: 12px !important; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;">
        <div class="text-center text-md-center mb-4 mt-md-0">
            <h1 class="mb-0 h3" style="color: #1e293b; font-weight: 700;">Login</h1>
            <p style="color: #64748b; margin-top: 0.5rem;">Silahkan Login Terlebih dahulu</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success" style="background: rgba(16, 185, 129, 0.1); color: #10b981; border: none; border-left: 4px solid #10b981; border-radius: 8px;">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border: none; border-left: 4px solid #ef4444; border-radius: 8px;">
                <i class="fas fa-exclamation-circle me-2"></i>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group mb-4">
                <label for="email" style="font-weight: 600; color: #1e293b;">Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1" style="background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%); border: none; border-radius: 8px 0 0 8px;">
                        <i class="fas fa-envelope" style="color: #1e40af;"></i>
                    </span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="example@company.com" id="email" value="{{ old('email') }}"
                        required autofocus autocomplete="email"
                        style="border: 2px solid #dbeafe; border-left: none; border-radius: 0 8px 8px 0; padding: 0.875rem 1rem; transition: all 0.3s ease; background: #f8fafc;">
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password" style="font-weight: 600; color: #1e293b;">Password</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2" style="background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%); border: none; border-radius: 8px 0 0 8px;">
                        <i class="fas fa-lock" style="color: #1e40af;"></i>
                    </span>
                    <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
                        id="password" name="password" required autocomplete="current-password"
                        style="border: 2px solid #dbeafe; border-left: none; border-radius: 0 8px 8px 0; padding: 0.875rem 1rem; transition: all 0.3s ease; background: #f8fafc;">
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border: none; border-radius: 8px; padding: 0.875rem 2rem; font-weight: 600; color: white; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Sign in
                </button>
            </div>

            <div class="text-center">
                <p style="color: #64748b; margin: 0;">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" style="color: #10b981; text-decoration: none; font-weight: 600;">
                        Daftar di sini
                    </a>
                </p>
            </div>
        </form>
    </div>

    <style>
        .form-control:focus {
            border-color: #60a5fa !important;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.2) !important;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px -1px rgba(59, 130, 246, 0.4) !important;
        }

        .input-group-text {
            transition: all 0.3s ease;
        }

        a:hover {
            text-decoration: underline !important;
        }
    </style>
@endsection
