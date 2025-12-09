@extends('layouts.app')

@section('title', 'Data Proyek')

@section('content_header')
    <h1>Data Proyek</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 flex-grow-1" style="width:auto;">List Data Proyek</h3>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>

        <!-- Search and Filter Form -->
        <div class="card-body">
            <form method="GET" action="{{ route('proyek.index') }}" class="mb-3">
                <div class="row">
                    <!-- Search Input -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="search">Cari</label>
                            <input type="text" name="search" id="search" class="form-control"
                                   placeholder="Cari kode, nama, lokasi, sumber dana..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Filter Tahun -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">Semua Tahun</option>
                                @foreach($tahunList as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filter Sumber Dana -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sumber_dana">Sumber Dana</label>
                            <select name="sumber_dana" id="sumber_dana" class="form-control">
                                <option value="">Semua Sumber Dana</option>
                                @foreach($sumberDanaList as $sumber)
                                    <option value="{{ $sumber }}" {{ request('sumber_dana') == $sumber ? 'selected' : '' }}>
                                        {{ $sumber }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filter Lokasi -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select name="lokasi" id="lokasi" class="form-control">
                                <option value="">Semua Lokasi</option>
                                @foreach($lokasiList as $lokasi)
                                    <option value="{{ $lokasi }}" {{ request('lokasi') == $lokasi ? 'selected' : '' }}>
                                        {{ $lokasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="d-flex" style="gap: 0.5rem;">
                                <button type="submit" class="btn btn-primary" style="flex: 1;">
                                    <i class="fa fa-search"></i> Filter
                                </button>
                                <a href="{{ route('proyek.index') }}" class="btn btn-secondary" style="flex: 1;">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body table-responsive">
            <table id="crudTable" class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Kode Proyek</th>
                        <th>Nama Proyek</th>
                        <th>Tahun</th>
                        <th>Lokasi</th>
                        <th>Anggaran</th>
                        <th>Sumber Dana</th>
                        <th>Deskripsi</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proyeks as $item)
                        <tr>
                            <td>{{ $item->kode_proyek }}</td>
                            <td>
                                <div class="proyek-name-card">
                                    <div class="proyek-name-media">
                                        <img src="{{ $item->cover_photo_url }}" alt="{{ $item->nama_proyek }}">
                                    </div>
                                    <div class="proyek-name-content">
                                        <div class="title">{{ $item->nama_proyek }}</div>
                                        <div class="subtitle">
                                            <span class="badge bg-light text-dark">{{ $item->kode_proyek }}</span>
                                            <span class="text-muted ms-2">Lokasi: {{ $item->lokasi }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
                            <td>{{ $item->sumber_dana }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ route('proyek.show', $item) }}" class="btn btn-sm btn-info"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{ route('proyek.edit', $item->proyek_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('proyek.destroy', $item->proyek_id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row g-2 align-items-center">
                <div class="col-sm">
                    <small class="text-muted">
                        Menampilkan {{ $proyeks->firstItem() ?? 0 }} sampai {{ $proyeks->lastItem() ?? 0 }}
                        dari {{ $proyeks->total() }} data
                    </small>
                </div>
                <div class="col-sm-auto ms-sm-auto">
                    {{ $proyeks->onEachSide(1)->links('vendor.pagination.adminlte') }}
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
    <style>
        .proyek-name-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background-color: #f8fafc;
        }

        .proyek-name-media img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.1);
        }

        .proyek-name-content .title {
            font-weight: 600;
            color: #0f172a;
        }

        .proyek-name-content .subtitle {
            font-size: 0.85rem;
        }
    </style>
@endpush

@section('js')
    <script>
        $(function() {
            $('#crudTable').DataTable({
                dom: 't', // tampilkan hanya tabel, tanpa kontrol bawaan DataTables
                paging: false,
                searching: false,
                info: false,
                lengthChange: false,
                responsive: true,
                autoWidth: false,
                ordering: true
            });
        });
    </script>
@stop
