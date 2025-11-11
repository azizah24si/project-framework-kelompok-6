@extends('adminlte::page')

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



        <div class="card-body table-responsive">
            <table id="crudTable" class="table table-bordered table-striped">
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
                            <td>{{ $item->nama_proyek }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
                            <td>{{ $item->sumber_dana }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
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
                            <td colspan="6">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <<div class="mt-3">
            {{ $proyeks->links() }}
    </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $('#crudTable').DataTable({
                "paging": false, // biarkan pagination Laravel yang jalan
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
