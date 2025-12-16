@php
    use Illuminate\Support\Facades\Auth;
@endphp

<ul class="navbar-nav ms-auto align-items-center">
    @if (Auth::check())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->profile_photo_url ?? asset('assets-admin/img/team/profile-picture-1.jpg') }}"
                     class="avatar rounded-circle me-2" alt="User avatar" width="32" height="32">
                <div class="d-none d-md-block text-start">
                    <div class="fw-bold small">{{ Auth::user()->name }}</div>
                    <div class="text-muted small">{{ session('last_login') }}</div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item-text fw-semibold">{{ Auth::user()->name }}</span>
                <span class="dropdown-item-text text-muted">{{ session('last_login') }}</span>
                <div class="dropdown-divider"></div>
                <form action="{{ route('auth.logout') }}" method="POST" class="px-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        </li>
    @endif
</ul>



