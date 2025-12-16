@php
    use Illuminate\Support\Facades\Auth;
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="fas fa-home mr-1"></i> Dashboard
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">

        <!-- User Account Dropdown -->
        @if (Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="padding: 0.5rem 1rem;">
                    <div class="d-flex align-items-center">
                        <div class="user-avatar mr-2">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" 
                                     style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #e5e7eb;">
                            @else
                                <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="d-none d-md-block">
                            <div style="font-weight: 600; font-size: 14px; color: #1e293b;">{{ Auth::user()->name }}</div>
                            <div style="font-size: 12px; color: #64748b;">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 280px;">
                    <div class="dropdown-header bg-light">
                        <div class="d-flex align-items-center">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" 
                                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #e5e7eb; margin-right: 12px;">
                            @else
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; margin-right: 12px;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <div style="font-weight: 600; color: #1e293b;">{{ Auth::user()->name }}</div>
                                <div style="font-size: 12px; color: #64748b;">{{ Auth::user()->email }}</div>
                                @if(session('last_login'))
                                    <div style="font-size: 11px; color: #94a3b8;">Login terakhir: {{ session('last_login') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="fas fa-user mr-2"></i> Profil Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                </a>
            </li>
        @endif

        <!-- Fullscreen Toggle -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Layar Penuh">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>


