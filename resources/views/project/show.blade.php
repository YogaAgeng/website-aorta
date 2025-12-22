@extends('layouts.app')

@section('title', $project->judul . ' - AORTA')

@push('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($project->deskripsi), 160) }}">
    <meta property="og:title" content="{{ $project->judul }} - AORTA">
    <meta property="og:description" content="{{ Str::limit(strip_tags($project->deskripsi), 160) }}">
    <meta property="og:type" content="article">
    @if($project->gambar)
        <meta property="og:image" content="{{ asset('storage/' . $project->gambar) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
@endpush

@section('content')
    <!-- Project Header -->
    <div class="bg-light py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Proyek</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->judul }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Project Detail -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    @if($project->gambar)
                        <div class="mb-4 rounded-3 overflow-hidden">
                            <img src="{{ asset('storage/' . $project->gambar) }}" alt="{{ $project->judul }}" 
                                 class="img-fluid w-100 rounded-3" style="max-height: 500px; object-fit: cover;">
                        </div>
                    @endif

                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-primary fs-6">{{ $project->kategori }}</span>
                        <span class="badge bg-{{ $project->status === 'berlangsung' ? 'success' : 'secondary' }} fs-6">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>

                    <h1 class="display-5 fw-bold mb-3">{{ $project->judul }}</h1>
                    
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="d-flex align-items-center text-muted">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <span>{{ $project->lokasi }}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted">
                            <i class="bi bi-calendar3 me-2"></i>
                            <span>{{ $project->tanggal_mulai->format('d M Y') }} - {{ $project->tanggal_selesai ? $project->tanggal_selesai->format('d M Y') : 'Sekarang' }}</span>
                        </div>
                    </div>

                    @if($project->target_donasi > 0)
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Donasi Terkumpul</h5>
                                    <span class="badge bg-primary">{{ round(($project->donasi_terkumpul / $project->target_donasi) * 100) }}%</span>
                                </div>
                                
                                <div class="progress mb-3" style="height: 10px;">
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
                                
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="h4 fw-bold text-primary">Rp {{ number_format($project->donasi_terkumpul, 0, ',', '.') }}</div>
                                        <div class="text-muted small">Terkumpul</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="h4 fw-bold">{{ $project->donatur_count ?? 0 }}</div>
                                        <div class="text-muted small">Donatur</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="h4 fw-bold">Rp {{ number_format($project->target_donasi, 0, ',', '.') }}</div>
                                        <div class="text-muted small">Target</div>
                                    </div>
                                </div>
                                
                                @if($project->status === 'berlangsung')
                                    <div class="d-grid mt-4">
                                        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#donasiModal">
                                            <i class="bi bi-heart-fill me-2"></i> Donasi Sekarang
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Deskripsi Proyek</h5>
                            <div class="project-content">
                                {!! $project->konten !!}
                            </div>
                        </div>
                    </div>

                    @if($project->dokumentasi->count() > 0)
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Dokumentasi</h5>
                                <div class="row g-3">
                                    @foreach($project->dokumentasi as $dokumentasi)
                                        <div class="col-md-4">
                                            <a href="{{ asset('storage/' . $dokumentasi->path) }}" data-fslightbox="gallery">
                                                <img src="{{ asset('storage/' . $dokumentasi->path) }}" 
                                                     alt="Dokumentasi {{ $project->judul }}" 
                                                     class="img-fluid rounded-3"
                                                     style="width: 100%; height: 200px; object-fit: cover;">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title mb-0">Update Terkini</h5>
                                @auth
                                    @can('update', $project)
                                        <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-plus-lg me-1"></i> Tambah Update
                                        </a>
                                    @endcan
                                @endauth
                            </div>
                            
                            @if($project->updates->count() > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($project->updates as $update)
                                        <div class="list-group-item px-0">
                                            <div class="d-flex justify-content-between mb-2">
                                                <h6 class="mb-1 fw-bold">{{ $update->judul }}</h6>
                                                <small class="text-muted">{{ $update->created_at->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-2">{{ Str::limit(strip_tags($update->konten), 200) }}</p>
                                            <a href="#" class="text-primary" data-bs-toggle="modal" 
                                               data-bs-target="#updateModal{{ $update->id }}">
                                                Baca selengkapnya
                                            </a>
                                        </div>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="updateModal{{ $update->id }}" tabindex="-1" 
                                             aria-labelledby="updateModalLabel{{ $update->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{ $update->id }}">
                                                            {{ $update->judul }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-muted small mb-3">
                                                            Diperbarui pada {{ $update->created_at->format('d M Y H:i') }}
                                                        </div>
                                                        <div class="update-content">
                                                            {!! $update->konten !!}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-newspaper display-4 text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Belum ada update untuk proyek ini.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Donate Card -->
                    @if($project->status === 'berlangsung' && $project->target_donasi > 0)
                        <div class="card border-0 shadow-sm sticky-top mb-4" style="top: 20px;">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-4">Dukung Proyek Ini</h5>
                                <div class="mb-4">
                                    <div class="display-4 fw-bold text-primary">
                                        {{ round(($project->donasi_terkumpul / $project->target_donasi) * 100) }}%
                                    </div>
                                    <div class="text-muted">Terkumpul dari target</div>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    @if($project->target_donasi > 0)
                                        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#donasiModal">
                                            <i class="bi bi-heart-fill me-2"></i> Donasi Sekarang
                                        </button>
                                    @endif
                                    
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#shareModal">
                                        <i class="bi bi-share me-2"></i> Bagikan
                                    </button>
                                </div>
                                
                                <div class="mt-4 text-start">
                                    <h6 class="fw-bold mb-3">Cara Berdonasi:</h6>
                                    <ol class="ps-3">
                                        <li class="mb-2">Klik tombol "Donasi Sekarang"</li>
                                        <li class="mb-2">Masukkan nominal donasi</li>
                                        <li class="mb-2">Pilih metode pembayaran</li>
                                        <li class="mb-2">Selesaikan pembayaran</li>
                                        <li>Dapatkan bukti donasi</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Project Info -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Informasi Proyek</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Status</span>
                                    <span class="fw-medium">
                                        @if($project->status === 'berlangsung')
                                            <span class="text-success">
                                                <i class="bi bi-circle-fill me-1"></i> Berlangsung
                                            </span>
                                        @elseif($project->status === 'selesai')
                                            <span class="text-primary">
                                                <i class="bi bi-check-circle-fill me-1"></i> Selesai
                                            </span>
                                        @else
                                            <span class="text-secondary">
                                                <i class="bi bi-clock-history me-1"></i> {{ ucfirst($project->status) }}
                                            </span>
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Kategori</span>
                                    <span class="fw-medium">{{ $project->kategori }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Lokasi</span>
                                    <span class="fw-medium">{{ $project->lokasi }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Tanggal Mulai</span>
                                    <span class="fw-medium">{{ $project->tanggal_mulai->format('d M Y') }}</span>
                                </li>
                                @if($project->tanggal_selesai)
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Tanggal Selesai</span>
                                        <span class="fw-medium">{{ $project->tanggal_selesai->format('d M Y') }}</span>
                                    </li>
                                @endif
                                @if($project->target_donasi > 0)
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Target Donasi</span>
                                        <span class="fw-medium">Rp {{ number_format($project->target_donasi, 0, ',', '.') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Donasi Terkumpul</span>
                                        <span class="fw-medium text-success">Rp {{ number_format($project->donasi_terkumpul, 0, ',', '.') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Donatur</span>
                                        <span class="fw-medium">{{ $project->donatur_count ?? 0 }} orang</span>
                                    </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Dibuat oleh</span>
                                    <span class="fw-medium">{{ $project->user->name }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Related Projects -->
                    @if($relatedProjects->count() > 0)
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Proyek Lainnya</h5>
                                <div class="list-group list-group-flush">
                                    @foreach($relatedProjects as $related)
                                        <a href="{{ route('project.show', $related->slug) }}" 
                                           class="list-group-item list-group-item-action px-0">
                                            <div class="d-flex align-items-center">
                                                @if($related->gambar)
                                                    <img src="{{ asset('storage/' . $related->gambar) }}" 
                                                         alt="{{ $related->judul }}" 
                                                         class="rounded me-3" 
                                                         style="width: 60px; height: 60px; object-fit: cover;">
                                                @endif
                                                <div>
                                                    <h6 class="mb-1">{{ $related->judul }}</h6>
                                                    <div class="d-flex align-items-center text-muted small">
                                                        <span class="me-2">{{ $related->kategori }}</span>
                                                        <span class="badge bg-{{ $related->status === 'berlangsung' ? 'success' : 'secondary' }} text-white">
                                                            {{ ucfirst($related->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Modal -->
    <div class="modal fade" id="donasiModal" tabindex="-1" aria-labelledby="donasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donasiModalLabel">Donasi untuk {{ $project->judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('donasi.store') }}" method="POST" id="donationForm">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-bold">Nominal Donasi</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control form-control-lg" id="amount" name="amount" 
                                       placeholder="Masukkan nominal" required>
                            </div>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <button type="button" class="btn btn-outline-primary amount-btn" data-amount="50000">50K</button>
                                <button type="button" class="btn btn-outline-primary amount-btn" data-amount="100000">100K</button>
                                <button type="button" class="btn btn-outline-primary amount-btn" data-amount="250000">250K</button>
                                <button type="button" class="btn btn-outline-primary amount-btn" data-amount="500000">500K</button>
                                <button type="button" class="btn btn-outline-primary amount-btn" data-amount="1000000">1JT</button>
                                <button type="button" class="btn btn-outline-primary" id="customAmount">Lainnya</button>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Metode Pembayaran</label>
                            <div class="list-group">
                                <label class="list-group-item d-flex align-items-center">
                                    <input class="form-check-input me-3" type="radio" name="payment_method" value="bca" checked>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/bca.png') }}" alt="BCA" style="height: 24px;" class="me-2">
                                        <span>Bank BCA</span>
                                    </div>
                                </label>
                                <label class="list-group-item d-flex align-items-center">
                                    <input class="form-check-input me-3" type="radio" name="payment_method" value="bri">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/bri.png') }}" alt="BRI" style="height: 24px;" class="me-2">
                                        <span>Bank BRI</span>
                                    </div>
                                </label>
                                <label class="list-group-item d-flex align-items-center">
                                    <input class="form-check-input me-3" type="radio" name="payment_method" value="bni">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/bni.png') }}" alt="BNI" style="height: 24px;" class="me-2">
                                        <span>Bank BNI</span>
                                    </div>
                                </label>
                                <label class="list-group-item d-flex align-items-center">
                                    <input class="form-check-input me-3" type="radio" name="payment_method" value="mandiri">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/mandiri.png') }}" alt="Mandiri" style="height: 24px;" class="me-2">
                                        <span>Bank Mandiri</span>
                                    </div>
                                </label>
                                <label class="list-group-item d-flex align-items-center">
                                    <input class="form-check-input me-3" type="radio" name="payment_method" value="gopay">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/gopay.png') }}" alt="Gopay" style="height: 24px;" class="me-2">
                                        <span>Gopay</span>
                                    </div>
                                </label>
                                <label class="list-group-item d-flex align-items-center">
                                    <input class="form-check-input me-3" type="radio" name="payment_method" value="ovo">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/ovo.png') }}" alt="OVO" style="height: 24px;" class="me-2">
                                        <span>OVO</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ auth()->user()->name ?? '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ auth()->user()->email ?? '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                   value="{{ auth()->user()->phone ?? '' }}" required>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="anonim" name="is_anonim">
                            <label class="form-check-label" for="anonim">
                                Sembunyikan nama saya (Donasi sebagai Anonim)
                            </label>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="newsletter" name="subscribe_newsletter" checked>
                            <label class="form-check-label" for="newsletter">
                                Saya ingin menerima update proyek ini melalui email
                            </label>
                        </div>
                        
                        <div class="alert alert-info">
                            <small class="d-block mb-1">Dengan melanjutkan, Saya menyetujui:</small>
                            <ul class="mb-0 ps-3">
                                <li><small>Donasi yang sudah dibayarkan tidak dapat dikembalikan</small></li>
                                <li><small>Donasi akan digunakan sesuai dengan tujuan proyek</small></li>
                                <li><small>Data pribadi akan dilindungi sesuai dengan kebijakan privasi</small></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-credit-card me-2"></i> Lanjutkan Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Bagikan Proyek Ini</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-4">Bagikan proyek ini ke media sosial atau salin tautan untuk dibagikan.</p>
                    
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('project.show', $project->slug)) }}" 
                           target="_blank" class="btn btn-outline-primary rounded-circle p-3">
                            <i class="bi bi-facebook fs-4"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('project.show', $project->slug)) }}&text={{ urlencode($project->judul) }}" 
                           target="_blank" class="btn btn-outline-info rounded-circle p-3">
                            <i class="bi bi-twitter-x fs-4"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode('Lihat proyek ini: ' . route('project.show', $project->slug)) }}" 
                           target="_blank" class="btn btn-outline-success rounded-circle p-3">
                            <i class="bi bi-whatsapp fs-4"></i>
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(route('project.show', $project->slug)) }}&text={{ urlencode($project->judul) }}" 
                           target="_blank" class="btn btn-outline-primary rounded-circle p-3">
                            <i class="bi bi-telegram fs-4"></i>
                        </a>
                        <a href="mailto:?subject={{ urlencode($project->judul) }}&body={{ urlencode('Lihat proyek ini: ' . route('project.show', $project->slug)) }}" 
                           class="btn btn-outline-secondary rounded-circle p-3">
                            <i class="bi bi-envelope-fill fs-4"></i>
                        </a>
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="shareLink" 
                               value="{{ route('project.show', $project->slug) }}" readonly>
                        <button class="btn btn-outline-secondary" type="button" id="copyLinkBtn">
                            <i class="bi bi-clipboard"></i>
                        </button>
                    </div>
                    <div id="copySuccess" class="text-success text-center d-none">
                        <i class="bi bi-check-circle-fill me-1"></i> Tautan berhasil disalin!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .project-content {
        line-height: 1.8;
    }
    .project-content p {
        margin-bottom: 1.2rem;
    }
    .project-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem 0;
    }
    .project-content h2, 
    .project-content h3, 
    .project-content h4, 
    .project-content h5, 
    .project-content h6 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    .project-content ul, 
    .project-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }
    .project-content li {
        margin-bottom: 0.5rem;
    }
    .project-content blockquote {
        border-left: 4px solid #0d6efd;
        padding-left: 1.5rem;
        margin: 1.5rem 0;
        font-style: italic;
        color: #6c757d;
    }
    .amount-btn {
        min-width: 80px;
    }
    .progress {
        border-radius: 10px;
    }
    .progress-bar {
        border-radius: 10px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Format currency input
    document.addEventListener('DOMContentLoaded', function() {
        // Format amount input
        const amountInput = document.getElementById('amount');
        
        amountInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value ? parseInt(value, 10).toLocaleString('id-ID') : '';
            e.target.value = value;
        });
        
        // Set amount from quick buttons
        document.querySelectorAll('.amount-btn').forEach(button => {
            if (button.id !== 'customAmount') {
                button.addEventListener('click', function() {
                    const amount = this.getAttribute('data-amount');
                    amountInput.value = parseInt(amount).toLocaleString('id-ID');
                });
            }
        });
        
        // Custom amount button
        document.getElementById('customAmount').addEventListener('click', function() {
            const customAmount = prompt('Masukkan nominal donasi (minimal Rp 10.000):');
            if (customAmount) {
                const amount = parseInt(customAmount.replace(/\D/g, ''));
                if (amount >= 10000) {
                    amountInput.value = amount.toLocaleString('id-ID');
                } else {
                    alert('Nominal minimal donasi adalah Rp 10.000');
                }
            }
        });
        
        // Copy link functionality
        const copyLinkBtn = document.getElementById('copyLinkBtn');
        const copySuccess = document.getElementById('copySuccess');
        const shareLink = document.getElementById('shareLink');
        
        if (copyLinkBtn) {
            copyLinkBtn.addEventListener('click', function() {
                shareLink.select();
                document.execCommand('copy');
                
                copySuccess.classList.remove('d-none');
                setTimeout(() => {
                    copySuccess.classList.add('d-none');
                }, 3000);
            });
        }
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
    
    // Form submission
    document.getElementById('donationForm')?.addEventListener('submit', function(e) {
        const amount = document.getElementById('amount').value;
        const numericAmount = parseInt(amount.replace(/\D/g, ''));
        
        if (numericAmount < 10000) {
            e.preventDefault();
            alert('Nominal minimal donasi adalah Rp 10.000');
            return false;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
    });
</script>
@endpush
