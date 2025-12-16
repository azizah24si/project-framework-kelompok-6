@extends('layouts.app')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                             class="rounded-circle img-fluid" style="width: 160px; height: 160px; object-fit: cover;">
                    </div>
                    <h4 class="mb-1">{{ $user->name }}</h4>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="super admin" {{ old('role', $user->role) === 'super admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="Isi jika ingin mengganti password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation"
                                   placeholder="Ulangi password baru">
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <div class="d-flex align-items-start gap-3">
                                <div>
                                    <div id="photo-preview" class="mb-2">
                                        <img id="preview-image" src="{{ $user->profile_photo_url }}" alt="Current Photo" 
                                             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #e5e7eb;">
                                    </div>
                                    <input type="file" class="form-control @error('profile_photo') is-invalid @enderror"
                                           id="profile_photo" name="profile_photo" accept="image/*" onchange="previewPhoto(this)">
                                    <small class="text-muted">JPG/PNG, max 2MB. Leave empty to keep current photo.</small>
                                    @error('profile_photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
<script>
function previewPhoto(input) {
    const previewImage = document.getElementById('preview-image');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush




