@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content_header')
    <h1>Edit Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form edit proyek --}}
            <form action="{{ route('proyek.update', $proyek) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('proyek.form')

                <div class="mt-3">
                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Update
                    </a>
                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>



        </div>
    </div>

    {{-- Script format anggaran tetap disertakan --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const anggaranInput = document.getElementById('anggaran');
            if (!anggaranInput) return;

            // Format saat mengetik
            anggaranInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value) value = parseInt(value).toLocaleString('id-ID');
                e.target.value = value;
            });

            // Sebelum submit, ubah ke angka
            const form = anggaranInput.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    const rawValue = anggaranInput.value.replace(/\./g, '');
                    anggaranInput.value = rawValue;
                });
            }
        });
    </script>
@stop
