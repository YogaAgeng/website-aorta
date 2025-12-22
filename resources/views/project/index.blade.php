@extends('layouts.app')

@section('title', 'Proyek - AORTA')

@push('meta')
    <meta name="description" content="Temukan proyek sosial dan kemanusiaan yang membutuhkan dukungan Anda di AORTA.">
    <meta property="og:title" content="Proyek - AORTA">
    <meta property="og:description" content="Temukan proyek sosial dan kemanusiaan yang membutuhkan dukungan Anda di AORTA.">
    <meta property="og:type" content="website">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-3">Dukung Proyek Sosial Kami</h1>
                    <p class="lead">Bergabunglah dengan kami dalam menciptakan dampak positif bagi masyarakat melalui berbagai inisiatif sosial dan kemanusiaan.</p>
                    <a href="#projects" class="btn btn-light btn-lg mt-3">Lihat Proyek</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/project-hero.svg') }}" alt="Proyek Sosial" class="img-fluid d-none d-lg-block">
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-5">
        <div class="container">
            <!-- Search and Filter -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <form action="{{ route('project.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-lg" 
                                   placeholder="Cari proyek..." value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-lg" onchange="window.location.href=this.value">
                        <option value="{{ route('project.index', ['search' => request('search'), 'status' => request('status')]) }}">
                            Semua Kategori
                        </option>
                        @foreach($categories as $category => $count)
                            <option value="{{ route('project.index', ['kategori' => $category, 'search' => request('search'), 'status' => request('status')]) }}" 
                                    {{ request('kategori') == $category ? 'selected' : '' }}>
                                {{ $category }} ({{ $count }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-lg" onchange="window.location.href=this.value">
                        <option value="{{ route('project.index', ['kategori' => request('kategori'), 'search' => request('search')]) }}">
                            Semua Status
                        </option>
                        <option value="{{ route('project.index', ['status' => 'berlangsung', 'kategori' => request('kategori'), 'search' => request('search')]) }}" 
                                {{ request('status') == 'berlangsung' ? 'selected' : '' }}>
                            Berlangsung
                        </option>
                        <option value="{{ route('project.index', ['status' => 'selesai', 'kategori' => request('kategori'), 'search' => request('search')]) }}" 
                                {{ request('status') == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                    </select>
                </div>
            </div>

            <!-- Projects Grid -->
            @if($projects->count() > 0)
                <div class="row g-4">
                    @foreach($projects as $project)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm">
                                @if($project->gambar)
                                    <a href="{{ route('project.show', $project->slug) }}">
                                        <img src="{{ asset('storage/' . $project->gambar) }}" class="card-img-top" 
                                             alt="{{ $project->judul }}" style="height: 200px; object-fit: cover;">
                                    </a>
                                @endif
                                
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="badge bg-primary">{{ $project->kategori }}</span>
                                        <span class="badge bg-{{ $project->status === 'berlangsung' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </div>
                                    
                                    <h5 class="card-title">
                                        <a href="{{ route('project.show', $project->slug) }}" class="text-decoration-none text-dark">
                                            {{ $project->judul }}
                                        </a>
                                    </h5>
                                    
                                    <p class="card-text text-muted">
                                        <i class="bi bi-geo-alt me-1"></i> {{ $project->lokasi }}
                                    </p>
                                    
                                    <p class="card-text">
                                        {{ Str::limit(strip_tags($project->deskripsi), 120) }}
                                    </p>
                                    
                                    @if($project->target_donasi > 0)
                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Terkumpul</span>
                                                <span class="fw-bold">Rp {{ number_format($project->donasi_terkumpul, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="progress mb-3" style="height: 8px;">
                                                @php
                                                    $percentage = min(100, ($project->donasi_terkumpul / $project->target_donasi) * 100);
                                                @endphp
                                                <div class="progress-bar bg-success" role="progressbar" 
                                                     style="width: {{ $percentage }}%" 
                                                     aria-valuenow="{{ $percentage }}" 
                                                     aria-valuemin="0" 
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between text-muted small">
                                                <span>{{ round($percentage) }}% tercapai</span>
                                                <span>Target: Rp {{ number_format($project->target_donasi, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="card-footer bg-transparent border-top-0 pt-0">
                                    <a href="{{ route('project.show', $project->slug) }}" class="btn btn-primary w-100">
                                        @if($project->status === 'berlangsung' && $project->target_donasi > 0)
                                            Donasi Sekarang
                                        @else
                                            Lihat Detail
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $projects->appends(request()->except('page'))->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-folder-x display-1 text-muted"></i>
                    </div>
                    <h4>Proyek tidak ditemukan</h4>
                    <p class="text-muted">Tidak ada proyek yang sesuai dengan pencarian Anda.</p>
                    <a href="{{ route('project.index') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Proyek
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-light py-5">
        <div class="container text-center py-4">
            <h2 class="mb-4">Ingin Mengajukan Proyek Sosial?</h2>
            <p class="lead mb-4">Kami membuka kesempatan bagi Anda yang ingin mengajukan proyek sosial untuk didanai bersama.</p>
            @auth
                @can('create', App\Models\Project::class)
                    <a href="{{ route('admin.project.create') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle me-2"></i> Ajukan Proyek
                    </a>
                @else
                    <button class="btn btn-primary btn-lg" disabled>
                        Hubungi Admin untuk Mengajukan Proyek
                    </button>
                @endcan
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login untuk Mengajukan Proyek
                </a>
            @endauth
        </div>
    </section>
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .progress {
        border-radius: 10px;
    }
    .progress-bar {
        border-radius: 10px;
    }
</style>
@endpush
