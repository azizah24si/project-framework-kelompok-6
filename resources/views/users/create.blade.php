@extends('layouts.app')

@section('title', 'Create User')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-1" style="font-weight: 700; color: #1e293b;">
                <i class="fas fa-user-plus mr-2" style="color: #3b82f6;"></i>
                Create User
            </h1>
            <p class="text-muted mb-0">Add a new user to the system</p>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary" style="border-radius: 8px;">
            <i class="fas fa-arrow-left mr-1"></i>
            Back to Users
        </a>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card" style="border-radius: 12px; border: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 12px 12px 0 0;">
                    <h3 class="card-title mb-0" style="font-weight: 600;">
                        <i class="fas fa-user-plus mr-2"></i>
                        Create New User
                    </h3>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">-- Select Role --</option>
                                <option value="super admin" {{ old('role') === 'super admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <div class="d-flex align-items-start gap-3">
                                <div>
                                    <div id="photo-preview" class="mb-2" style="display: none;">
                                        <img id="preview-image" src="" alt="Preview" 
                                             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #e5e7eb;">
                                    </div>
                                    <input type="file" class="form-control @error('profile_photo') is-invalid @enderror"
                                           id="profile_photo" name="profile_photo" accept="image/*" onchange="previewPhoto(this)">
                                    <small class="text-muted">JPG/PNG, max 2MB. Optional.</small>
                                    @error('profile_photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Create
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
    const preview = document.getElementById('photo-preview');
    const previewImage = document.getElementById('preview-image');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
</script>
@endpush

