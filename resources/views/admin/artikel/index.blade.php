@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('header')
    <h5 class="mb-0">Kelola Artikel</h5>
@endsection

@section('header-button')
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Buat Artikel Baru
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari artikel..." value="{{ request('search') }}">
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
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($artikels as $artikel)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($artikel->gambar)
                                            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="rounded me-3" style="width: 60px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $artikel->judul }}</h6>
                                            <small class="text-muted">{{ $artikel->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $artikel->kategori }}</td>
                                <td>{{ $artikel->penulis }}</td>
                                <td>
                                    <span class="badge {{ $artikel->draft ? 'bg-secondary' : 'bg-success' }}">
                                        {{ $artikel->draft ? 'Draft' : 'Published' }}
                                    </span>
                                </td>
                                <td>{{ $artikel->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.artikel.edit', $artikel) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-{{ $artikel->draft ? 'success' : 'secondary' }} toggle-draft" data-id="{{ $artikel->id }}">
                                            <i class="bi {{ $artikel->draft ? 'bi-check-lg' : 'bi-file-earmark' }}"></i>
                                        </button>
                                        <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada artikel yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $artikels->links() }}
            </div>
        </div>
    </div>
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

        // Handle category filter change
        $('#categoryFilter, #statusFilter').change(function() {
            applyFilters();
        });

        // Toggle draft status
        $('.toggle-draft').click(function() {
            const button = $(this);
            const artikelId = button.data('id');
            
            $.ajax({
                url: `{{ url('admin/artikel') }}/${artikelId}/toggle-draft`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PATCH'
                },
                success: function(response) {
                    if (response.success) {
                        // Update button appearance
                        if (response.is_draft) {
                            button.removeClass('btn-outline-success').addClass('btn-outline-secondary');
                            button.html('<i class="bi bi-file-earmark"></i>');
                            button.closest('tr').find('.badge')
                                .removeClass('bg-success').addClass('bg-secondary')
                                .text('Draft');
                        } else {
                            button.removeClass('btn-outline-secondary').addClass('btn-outline-success');
                            button.html('<i class="bi bi-check-lg"></i>');
                            button.closest('tr').find('.badge')
                                .removeClass('bg-secondary').addClass('bg-success')
                                .text('Published');
                        }
                        
                        // Show success message
                        alert('Status artikel berhasil diubah');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });

        function applyFilters() {
            const search = $('#searchInput').val();
            const kategori = $('#categoryFilter').val();
            const status = $('#statusFilter').val();
            
            let url = '{{ route("admin.artikel.index") }}?'; 
            const params = [];
            
            if (search) params.push(`search=${encodeURIComponent(search)}`);
            if (kategori) params.push(`kategori=${encodeURIComponent(kategori)}`);
            if (status) params.push(`status=${status}`);
            
            window.location.href = url + params.join('&');
        }
    });
</script>
@endpush
