@extends('layouts.admin')

@section('title', 'Kelola Project')

@section('header')
    <h5 class="mb-0">Kelola Project</h5>
@endsection

@section('header-button')
    <a href="{{ route('admin.project.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Buat Project Baru
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari project..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="button" id="searchButton">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="categoryFilter">
                        <option value="">Semua Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">Semua Status</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" id="sortFilter">
                        <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                        <option value="donasi_tertinggi" {{ request('sort') == 'donasi_tertinggi' ? 'selected' : '' }}>Donasi Tertinggi</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Target Donasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($project->gambar)
                                            <img src="{{ asset('storage/' . $project->gambar) }}" alt="{{ $project->judul }}" class="rounded me-3" style="width: 60px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $project->judul }}</h6>
                                            <small class="text-muted">{{ $project->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $project->kategori }}</td>
                                <td>{{ $project->lokasi }}</td>
                                <td>Rp {{ number_format($project->target_donasi, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        $project->status === 'berlangsung' ? 'success' : 
                                        ($project->status === 'selesai' ? 'primary' : 
                                        ($project->status === 'draft' ? 'secondary' : 'danger')) 
                                    }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('project.show', $project->slug) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @foreach($statuses as $status)
                                                @if($status !== $project->status)
                                                    <li>
                                                        <a class="dropdown-item update-status" href="#" data-status="{{ $status }}">
                                                            Ubah ke {{ ucfirst($status) }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{ route('admin.project.destroy', $project) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger btn-delete">
                                                        <i class="bi bi-trash me-2"></i> Hapus
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada project yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>

    <!-- Status Update Form (Hidden) -->
    <form id="statusUpdateForm" method="POST" style="display: none;">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" id="statusInput">
    </form>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle search
        $('#searchButton').click(function() {
            applyFilters();
        });

        $('#searchInput').keypress(function(e) {
            if (e.which === 13) {
                applyFilters();
            }
        });

        // Handle filter changes
        $('#categoryFilter, #statusFilter, #sortFilter').change(function() {
            applyFilters();
        });

        // Update status
        $('.update-status').click(function(e) {
            e.preventDefault();
            const status = $(this).data('status');
            const form = $('#statusUpdateForm');
            
            if (confirm(`Apakah Anda yakin ingin mengubah status project menjadi "${status.charAt(0).toUpperCase() + status.slice(1)}"?`)) {
                form.attr('action', $(this).closest('tr').find('a[href*="/edit"]').attr('href') + '/update-status');
                $('#statusInput').val(status);
                form.submit();
            }
        });

        function applyFilters() {
            const search = $('#searchInput').val();
            const kategori = $('#categoryFilter').val();
            const status = $('#statusFilter').val();
            const sort = $('#sortFilter').val();
            
            let url = '{{ route("admin.project.index") }}?'; 
            const params = [];
            
            if (search) params.push(`search=${encodeURIComponent(search)}`);
            if (kategori) params.push(`kategori=${encodeURIComponent(kategori)}`);
            if (status) params.push(`status=${status}`);
            if (sort) params.push(`sort=${sort}`);
            
            window.location.href = url + params.join('&');
        }
    });
</script>
@endpush
