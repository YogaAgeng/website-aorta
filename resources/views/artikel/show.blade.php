@extends('layouts.app')

@section('title', $artikel->judul . ' - AORTA')

@push('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($artikel->deskripsi), 160) }}">
    <meta property="og:title" content="{{ $artikel->judul }} - AORTA">
    <meta property="og:description" content="{{ Str::limit(strip_tags($artikel->deskripsi), 160) }}">
    @if($artikel->gambar)
        <meta property="og:image" content="{{ asset('storage/' . $artikel->gambar) }}">
    @endif
    <meta property="og:type" content="article">
    <meta name="author" content="{{ $artikel->penulis }}">
    <meta name="twitter:card" content="summary_large_image">
@endpush

@section('content')
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
            </ol>
        </nav>

        <article class="blog-post">
            <header class="mb-5">
                <h1 class="display-5 fw-bold mb-3">{{ $artikel->judul }}</h1>
                
                <div class="d-flex align-items-center text-muted mb-3">
                    <div class="d-flex align-items-center me-3">
                        <i class="bi bi-person me-2"></i>
                        <span>{{ $artikel->penulis }}</span>
                    </div>
                    <div class="d-flex align-items-center me-3">
                        <i class="bi bi-calendar3 me-2"></i>
                        <time datetime="{{ $artikel->tanggal_terbit->format('Y-m-d') }}">
                            {{ $artikel->tanggal_terbit->translatedFormat('d F Y') }}
                        </time>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-tag me-2"></i>
                        <span>{{ $artikel->kategori }}</span>
                    </div>
                </div>

                @if($artikel->gambar)
                    <div class="featured-image mb-4">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded">
                    </div>
                @endif
            </header>

            <div class="blog-content mb-5">
                {!! $artikel->konten !!}
            </div>

            <footer class="border-top pt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <span class="me-2">Bagikan:</span>
                        <div class="social-share">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" class="text-decoration-none me-2" title="Share on Facebook">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($artikel->judul) }}" 
                               target="_blank" class="text-decoration-none me-2" title="Share on Twitter">
                                <i class="bi bi-twitter fs-4"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' ' . url()->current()) }}" 
                               target="_blank" class="text-decoration-none" title="Share on WhatsApp">
                                <i class="bi bi-whatsapp fs-4"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('artikel.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Artikel
                        </a>
                    </div>
                </div>
            </footer>
        </article>

        @if($relatedArticles->count() > 0)
            <section class="related-articles mt-5 pt-5">
                <h3 class="h4 mb-4">Artikel Lainnya</h3>
                <div class="row">
                    @foreach($relatedArticles as $related)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($related->gambar)
                                    <img src="{{ asset('storage/' . $related->gambar) }}" class="card-img-top" alt="{{ $related->judul }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('artikel.show', $related->slug) }}" class="text-decoration-none text-dark">
                                            {{ $related->judul }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted">
                                        <small>
                                            <i class="bi bi-calendar3 me-1"></i> {{ $related->tanggal_terbit->translatedFormat('d F Y') }}
                                        </small>
                                    </p>
                                    <a href="{{ route('artikel.show', $related->slug) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection
