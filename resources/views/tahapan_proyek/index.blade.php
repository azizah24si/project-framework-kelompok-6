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
                        <th width="160">Aksi</th>
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
                            <td>
                                <a href="{{ route('tahapan_proyek.show', $item) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('tahapan_proyek.edit', $item->tahap_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('tahapan_proyek.destroy', $item->tahap_id) }}" method="POST"
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
@stop

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
        });
    </script>
@stop
