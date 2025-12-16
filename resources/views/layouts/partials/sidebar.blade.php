@php
    $menu = [
        [
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'text' => 'Dashboard',
            'active' => request()->routeIs('dashboard')
        ],
        [
            'route' => 'proyek.index',
            'icon' => 'fas fa-project-diagram',
            'text' => 'Proyek',
            'active' => request()->routeIs('proyek.*')
        ],
        [
            'route' => 'tahapan_proyek.index',
            'icon' => 'fas fa-tasks',
            'text' => 'Tahapan Proyek',
            'active' => request()->routeIs('tahapan_proyek.*')
        ],
        [
            'route' => 'progres_proyek.index',
            'icon' => 'fas fa-chart-line',
            'text' => 'Progress Proyek',
            'active' => request()->routeIs('progres_proyek.*')
        ],
        [
            'route' => 'lokasi_proyek.index',
            'icon' => 'fas fa-map-marked-alt',
            'text' => 'Lokasi Proyek',
            'active' => request()->routeIs('lokasi_proyek.*')
        ],
        [
            'route' => 'kontraktor.index',
            'icon' => 'fas fa-hard-hat',
            'text' => 'Kontraktor',
            'active' => request()->routeIs('kontraktor.*')
        ],
        [
            'route' => 'users.index',
            'icon' => 'fas fa-users',
            'text' => 'Pengguna',
            'active' => request()->routeIs('users.*')
        ],
    ];
@endphp

<aside class="main-sidebar elevation-4" style="background: linear-gradient(180deg, #f8fafc 0%, #e0f2fe 100%); border-right: 1px solid #dbeafe;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%); border-bottom: 1px solid #dbeafe; padding: 15px 20px; display: block; text-decoration: none;">
        <div class="d-flex align-items-center">
            <div style="width: 40px; height: 40px; background: rgba(30, 64, 175, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                <i class="fas fa-building" style="color: #1e40af; font-size: 18px;"></i>
            </div>
            <span class="brand-text" style="color: #1e40af; font-weight: 600; font-size: 16px; line-height: 1.2;">Pembangunan</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top: 10px;">
        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="padding: 0 12px;">
                @foreach ($menu as $item)
                    <li class="nav-item" style="margin-bottom: 6px;">
                        <a href="{{ route($item['route']) }}" 
                           class="nav-link {{ $item['active'] ? 'active' : '' }}"
                           style="border-radius: 8px; 
                                  padding: 10px 14px; 
                                  transition: all 0.3s ease; 
                                  display: flex; 
                                  align-items: center;
                                  text-decoration: none;
                                  margin: 0;
                                  {{ $item['active'] ? 'background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); color: white; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.25);' : 'color: #475569; background: transparent;' }}">
                            <i class="nav-icon {{ $item['icon'] }}" 
                               style="margin-right: 12px; 
                                      width: 18px; 
                                      text-align: center; 
                                      font-size: 15px;
                                      flex-shrink: 0;
                                      {{ $item['active'] ? 'color: white;' : 'color: #60a5fa;' }}"></i>
                            <span style="font-weight: 500; font-size: 14px; line-height: 1.4; flex: 1;">
                                {{ $item['text'] }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>

<style>
.main-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 1000;
    overflow-y: auto;
}

.nav-sidebar .nav-link {
    margin: 0 !important;
    border: none !important;
}

.nav-sidebar .nav-link:hover:not(.active) {
    background: rgba(96, 165, 250, 0.1) !important;
    color: #1e40af !important;
    transform: none !important;
    box-shadow: 0 1px 3px rgba(96, 165, 250, 0.12) !important;
}

.nav-sidebar .nav-link:hover:not(.active) .nav-icon {
    color: #3b82f6 !important;
}

.nav-sidebar .nav-link.active {
    transform: none !important;
    margin: 0 !important;
    border: none !important;
    position: relative !important;
}

.brand-link:hover {
    background: linear-gradient(135deg, #93c5fd 0%, #7dd3fc 100%) !important;
    transform: scale(1.02);
    transition: all 0.3s ease;
}

/* Scrollbar styling */
.main-sidebar::-webkit-scrollbar {
    width: 6px;
}

.main-sidebar::-webkit-scrollbar-track {
    background: rgba(96, 165, 250, 0.1);
}

.main-sidebar::-webkit-scrollbar-thumb {
    background: rgba(96, 165, 250, 0.3);
    border-radius: 3px;
}

.main-sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(96, 165, 250, 0.5);
}
</style>


