<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AdminLTE & Dependencies (Latest Version) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayScrollbars@2.3.0/styles/overlayscrollbars.min.css">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Modern Styles -->
    <style>
        :root {
            --primary-color: #60a5fa;
            --primary-dark: #3b82f6;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --border-color: #e2e8f0;
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
        }

        /* Modern Sidebar */
        .main-sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: var(--shadow-lg);
        }

        .brand-link {
            background: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .brand-text {
            font-weight: 600 !important;
            font-size: 1.2rem;
            color: white !important;
        }

        /* Modern Navigation */
        .nav-sidebar .nav-link {
            border-radius: 8px;
            margin: 2px 8px;
            transition: all 0.3s ease;
            color: rgba(255, 255, 255, 0.8);
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(4px);
        }

        .nav-sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: var(--shadow);
        }

        .nav-sidebar .nav-icon {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        /* Modern Navbar */
        .main-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow);
        }

        .navbar-light .navbar-nav .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: var(--primary-color);
        }

        /* Modern Content */
        .content-wrapper {
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
        }

        .content-header {
            padding: 1.5rem 0;
        }

        .content-header h1 {
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }

        /* Modern Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            border-radius: 12px 12px 0 0 !important;
            padding: 1.25rem;
        }

        .card-title {
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }

        /* Modern Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: var(--primary-color);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 8px -1px rgba(59, 130, 246, 0.4);
        }

        .btn-success {
            background: var(--success-color);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
        }

        .btn-warning {
            background: var(--warning-color);
            box-shadow: 0 4px 6px -1px rgba(245, 158, 11, 0.3);
        }

        .btn-danger {
            background: var(--danger-color);
            box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.3);
        }

        /* Modern Tables */
        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            background: var(--light-color);
            border: none;
            font-weight: 600;
            color: var(--dark-color);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        /* Modern Footer */
        .main-footer {
            background: white;
            border-top: 1px solid var(--border-color);
            color: var(--secondary-color);
        }

        /* Modern Dropdown */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: var(--light-color);
            color: var(--primary-color);
        }

        /* Modern Form Controls */
        .form-control {
            border-radius: 8px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Modern Info Boxes */
        .info-box {
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: none;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .info-box-icon {
            border-radius: 12px 0 0 12px;
        }

        /* Modern Small Boxes */
        .small-box {
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .small-box:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .small-box .icon {
            top: 10px;
            right: 15px;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    @stack('css')
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    @hasSection('content_header')
                        @yield('content_header')
                    @endif
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        @include('layouts.partials.footer')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayScrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Initialize OverlayScrollbars
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling
            document.documentElement.style.scrollBehavior = 'smooth';
            
            // Add loading animation
            $('.content-wrapper').hide().fadeIn(300);
            
            // Enhanced sidebar toggle
            $('[data-widget="pushmenu"]').on('click', function() {
                setTimeout(function() {
                    $('.content-wrapper').addClass('sidebar-transition');
                    setTimeout(function() {
                        $('.content-wrapper').removeClass('sidebar-transition');
                    }, 300);
                }, 50);
            });
        });
    </script>

    @stack('js')
    @stack('scripts')
</body>
</html>

