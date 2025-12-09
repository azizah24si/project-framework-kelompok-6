@php
    $menu = [
        ['route' => 'dashboard', 'icon' => 'fas fa-tachometer-alt', 'text' => 'Dashboard', 'active' => request()->routeIs('dashboard')],
        ['route' => 'proyek.index', 'icon' => 'fas fa-project-diagram', 'text' => 'Proyek', 'active' => request()->routeIs('proyek.*')],
        ['route' => 'tahapan_proyek.index', 'icon' => 'fas fa-tasks', 'text' => 'Tahapan Proyek', 'active' => request()->routeIs('tahapan_proyek.*')],
        ['route' => 'users.index', 'icon' => 'fas fa-users', 'text' => 'User', 'active' => request()->routeIs('users.*')],
    ];
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Pembangunan</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                @foreach ($menu as $item)
                    <li class="nav-item">
                        <a href="{{ route($item['route']) }}" class="nav-link {{ $item['active'] ? 'active' : '' }}">
                            <i class="nav-icon {{ $item['icon'] }}"></i>
                            <p>{{ $item['text'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>

