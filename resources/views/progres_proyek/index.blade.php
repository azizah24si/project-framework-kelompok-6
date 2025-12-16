@extends('layouts.app')

@section('title', 'Project Progress')

@section('content_header')
    <h1>Project Progress</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 flex-grow-1" style="width:auto;">Project Progress List</h3>
            <a href="{{ route('progres_proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th width="80">Foto</th>
                            <th>Proyek</th>
                            <th>Tahap</th>
                            <th>Persen Real</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th width="140" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            @php
                                $firstPhoto = $item->photos->first();
                            @endphp
                            <tr>
                                <td class="text-center">
                                    @if($firstPhoto)
                                        <img src="{{ Storage::url($firstPhoto->file_path) }}" 
                                             class="img-thumbnail" 
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px; border-radius: 4px;">
                                            <i class="fa fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->proyek->nama_proyek ?? '-' }}</td>
                                <td>{{ $item->tahap->nama_tahap ?? '-' }}</td>
                                <td>{{ number_format($item->persen_real, 2) }}%</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('progres_proyek.show', $item) }}" 
                                           class="btn btn-sm" 
                                           style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); 
                                                  color: white; 
                                                  border: none; 
                                                  border-radius: 8px 0 0 8px; 
                                                  padding: 8px 12px; 
                                                  transition: all 0.3s ease;
                                                  box-shadow: 0 2px 4px rgba(6, 182, 212, 0.3);
                                                  text-decoration: none;"
                                           title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('progres_proyek.edit', $item) }}" 
                                           class="btn btn-sm" 
                                           style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); 
                                                  color: white; 
                                                  border: none; 
                                                  border-radius: 0; 
                                                  padding: 8px 12px; 
                                                  transition: all 0.3s ease;
                                                  box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);
                                                  text-decoration: none;"
                                           title="Edit Progres">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('progres_proyek.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus progres ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm" 
                                                    style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); 
                                                           color: white; 
                                                           border: none; 
                                                           border-radius: 0 8px 8px 0; 
                                                           padding: 8px 12px; 
                                                           transition: all 0.3s ease;
                                                           box-shadow: 0 2px 4px rgba(239, 68, 68, 0.3);"
                                                    title="Hapus Progres">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Belum ada data progres.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="row g-2 align-items-center">
                <div class="col-sm">
                    <small class="text-muted">
                        Menampilkan {{ $items->firstItem() ?? 0 }} sampai {{ $items->lastItem() ?? 0 }}
                        dari {{ $items->total() }} data
                    </small>
                </div>
                <div class="col-sm-auto ms-sm-auto">
                    {{ $items->onEachSide(1)->links('vendor.pagination.adminlte') }}
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

.btn-group .btn:nth-child(2):hover {
    box-shadow: 0 4px 8px rgba(249, 115, 22, 0.4) !important;
}

.btn-group .btn:last-child:hover {
    box-shadow: 0 4px 8px rgba(239, 68, 68, 0.4) !important;
}

.table td {
    vertical-align: middle;
}
</style>
@endpush

@push('js')
<script>
$(document).ready(function() {
    // Tambahkan tooltip untuk button actions
    $('[title]').tooltip();
});
</script>
@endpush