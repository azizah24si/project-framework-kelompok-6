@extends('layouts.app')

@section('title', 'Project Locations')

@section('content_header')
    <h1>Project Locations</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 flex-grow-1" style="width:auto;">Project Locations List</h3>
            <a href="{{ route('lokasi_proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th width="80">Media</th>
                            <th>Proyek</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>GeoJSON</th>
                            <th width="140" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            @php
                                $firstMedia = $item->media->first();
                            @endphp
                            <tr>
                                <td class="text-center">
                                    @if($firstMedia)
                                        @if(in_array(strtolower(pathinfo($firstMedia->original_name, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ Storage::url($firstMedia->file_path) }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px; border-radius: 4px;">
                                                <i class="fa fa-file-pdf text-danger"></i>
                                            </div>
                                        @endif
                                        @if($item->media->count() > 1)
                                            <small class="d-block text-muted">+{{ $item->media->count() - 1 }} lainnya</small>
                                        @endif
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px; border-radius: 4px;">
                                            <i class="fa fa-images text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->proyek->nama_proyek ?? '-' }}</td>
                                <td>{{ $item->lat }}</td>
                                <td>{{ $item->lng }}</td>
                                <td>
                                    @if ($item->geojson)
                                        <code class="text-truncate" style="max-width: 200px;" title="{{ json_encode($item->geojson) }}">
                                            {{ \Illuminate\Support\Str::limit(json_encode($item->geojson), 60) }}
                                        </code>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('lokasi_proyek.show', $item) }}" 
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
                                        <a href="{{ route('lokasi_proyek.edit', $item) }}" 
                                           class="btn btn-sm" 
                                           style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); 
                                                  color: white; 
                                                  border: none; 
                                                  border-radius: 0; 
                                                  padding: 8px 12px; 
                                                  transition: all 0.3s ease;
                                                  box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);
                                                  text-decoration: none;"
                                           title="Edit Lokasi">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('lokasi_proyek.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus lokasi ini?')">
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
                                                    title="Hapus Lokasi">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data lokasi.</td>
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