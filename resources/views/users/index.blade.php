@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content_header')
    <h1>Manajemen Pengguna</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-end justify-content-between">
                <form method="GET" action="{{ route('users.index') }}" class="w-100">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-4">
                            <label for="search" class="form-label">Cari User</label>
                            <input type="text" class="form-control" id="search" name="search"
                                   value="{{ request('search') }}" placeholder="Nama atau email">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i> Cari
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">
                                <i class="fa fa-times"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
                <a href="{{ route('users.create') }}" class="btn btn-success ms-3">
                    <i class="fa fa-plus"></i> Tambah User
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                     class="rounded-circle" width="48" height="48">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucwords($user->role) }}</td>
                            <td>{{ $user->created_at?->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pengguna.</td>
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
@stop

