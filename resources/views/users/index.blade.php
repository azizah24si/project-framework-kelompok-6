@extends('layouts.app')

@section('title', 'User Management')

@section('content_header')
    <h1>User Management</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif



    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 flex-grow-1" style="width:auto;">User List</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('users.index') }}" class="mb-3">
                <div class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" class="form-control" id="search" name="search"
                               value="{{ request('search') }}" placeholder="Name or email">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i> Filter
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">
                            <i class="fa fa-times"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th width="120" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                     class="rounded-circle user-avatar" width="48" height="48"
                                     style="object-fit: cover;">
                            </td>
                            <td class="fw-semibold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge bg-light text-dark">{{ ucwords($user->role) }}</span></td>
                            <td>{{ $user->created_at?->format('d M Y') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm" 
                                            style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); 
                                                   color: white; 
                                                   border: none; 
                                                   border-radius: 8px 0 0 8px; 
                                                   padding: 8px 12px; 
                                                   transition: all 0.3s ease;
                                                   box-shadow: 0 2px 4px rgba(6, 182, 212, 0.3);"
                                            onclick="viewUser({{ $user->id }})"
                                            title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                       class="btn btn-sm" 
                                       style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); 
                                              color: white; 
                                              border: none; 
                                              border-radius: 0 8px 8px 0; 
                                              padding: 8px 12px; 
                                              transition: all 0.3s ease;
                                              box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);
                                              text-decoration: none;"
                                       title="Edit Pengguna">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                        <td colspan="6" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row g-2 align-items-center">
                <div class="col-sm">
                    <small class="text-muted">
                        Menampilkan {{ $users->firstItem() ?? 0 }} - {{ $users->lastItem() ?? 0 }}
                        dari {{ $users->total() }} pengguna
                    </small>
                </div>
                <div class="col-sm-auto ms-sm-auto">
                    {{ $users->onEachSide(1)->links('vendor.pagination.adminlte') }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('css')
<style>
.btn-group .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
}

.btn-group .btn:first-child:hover {
    box-shadow: 0 4px 8px rgba(6, 182, 212, 0.4) !important;
}

.btn-group .btn:last-child:hover {
    box-shadow: 0 4px 8px rgba(249, 115, 22, 0.4) !important;
}

.table td {
    vertical-align: middle;
}

.user-avatar {
    border: 3px solid #e5e7eb;
    transition: all 0.3s ease;
}

.user-avatar:hover {
    border-color: #60a5fa;
    transform: scale(1.05);
}
</style>
@endpush

@push('js')
<script>
function viewUser(userId) {
    // Redirect ke halaman detail user
    window.location.href = '/users/' + userId;
}

// Tambahkan tooltip untuk button actions
$(document).ready(function() {
    $('[title]').tooltip();
});
</script>
@endpush