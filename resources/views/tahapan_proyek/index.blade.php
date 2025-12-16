@extends('layouts.app')

@section('title', 'Data Tahapan Proyek')

@section('content_header')
    <h1>Data Tahapan Proyek</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 flex-grow-1" style="width:auto;">List Data Proyek</h3>
            <a href="{{ route('tahapan_proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>


        <div class="card-body table-responsive">
            <table id="crudTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Tahap</th>
                        <th>Proyek</th>
                        <th>Target (%)</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tahapans as $item)
                        <tr>
                            <td>{{ $item->nama_tahap }}</td>
                            <td>{{ $item->proyek->nama_proyek ?? '-' }}</td>
                            <td>{{ $item->target_persen }}%</td>
                            <td>{{ $item->tgl_mulai }}</td>
                            <td>{{ $item->tgl_selesai }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('tahapan_proyek.show', $item) }}" 
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
                                    <a href="{{ route('tahapan_proyek.edit', $item->tahap_id) }}" 
                                       class="btn btn-sm" 
                                       style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); 
                                              color: white; 
                                              border: none; 
                                              border-radius: 0; 
                                              padding: 8px 12px; 
                                              transition: all 0.3s ease;
                                              box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);
                                              text-decoration: none;"
                                       title="Edit Tahapan">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tahapan_proyek.destroy', $item->tahap_id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                                title="Hapus Tahapan">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $tahapans->links() }}
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

@section('js')
    <script>
        $(function() {
            $('#crudTable').DataTable({
                "paging": false, // pagination pakai Laravel
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "info": false,
                "searching": true
            });
            
            // Tambahkan tooltip untuk button actions
            $('[title]').tooltip();
        });
    </script>
@stop
