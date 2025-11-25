@extends('layouts.poseify')

@section('title', 'Tambah Proyek')

@push('styles')
<style>
    .form-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 60px 0;
        margin-bottom: 40px;
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 text-white mb-2">
                    <i class="fa fa-plus-circle me-2"></i>Tambah Proyek Baru
                </h1>
                <p class="text-white-50 mb-0">Isi formulir di bawah untuk menambahkan proyek baru</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-card">
                <form action="{{ route('proyek.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include('proyek.form')

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="fa fa-save me-2"></i>Simpan Proyek
                        </button>
                        <a href="{{ route('proyek.index') }}" class="btn btn-secondary flex-fill">
                            <i class="fa fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
