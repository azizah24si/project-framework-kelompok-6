<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ route('proyek.index') }}">Proyek</a>
                </li>
                <li role="presentation" class="mt-2">
                    <a href="{{ route('tahapan_proyek.index') }}">Tahapan Proyek</a>
                </li>
                <li role="presentation" class="mt-2">
                    <a href="{{ route('users.index') }}">User</a>
                </li>
            </ul>
        </div>
    </div>
</div>
