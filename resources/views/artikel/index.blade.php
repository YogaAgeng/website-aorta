@extends('layouts.app')

@section('title', 'Artikel - AORTA')

@push('meta')
    <meta name="description" content="Temukan artikel menarik seputar kegiatan dan informasi terbaru dari AORTA.">
    <meta property="og:title" content="Artikel - AORTA">
    <meta property="og:description" content="Temukan artikel menarik seputar kegiatan dan informasi terbaru dari AORTA.">
    <meta property="og:type" content="website">
@endpush

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">Artikel Terbaru</h1>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(request('sort') == 'terlama')
                                Terlama
                            @else
                                Terbaru
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item {{ !request('sort') || request('sort') == 'terbaru' ? 'active' : '' }}" 
                                  href="{{ route('artikel.index', ['kategori' => request('kategori'), 'search' => request('search'), 'sort' => 'terbaru']) }}">Terbaru</a></li>
                            <li><a class="dropdown-item {{ request('sort') == 'terlama' ? 'active' : '' }}" 
                                  href="{{ route('artikel.index', ['kategori' => request('kategori'), 'search' => request('search'), 'sort' => 'terlama']) }}">Terlama</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-8">
                        <form action="{{ route('artikel.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari artikel..." value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" onchange="window.location.href=this.value">
                            <option value="{{ route('artikel.index', ['search' => request('search'), 'sort' => request('sort')]) }}">
                                Semua Kategori
                            </option>
                            @foreach($categories as $category)
                                <option value="{{ route('artikel.index', ['kategori' => $category, 'search' => request('search'), 'sort' => request('sort')]) }}" 
                                        {{ request('kategori') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if($artikels->count() > 0)
                    <div class="row">
                        @foreach($artikels as $artikel)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    @if($artikel->gambar)
                                        <a href="{{ route('artikel.show', $artikel->slug) }}">
                                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 200px; object-fit: cover;">
                                        </a>
                                    @endif
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="badge bg-primary me-2">{{ $artikel->kategori }}</span>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar3 me-1"></i> {{ $artikel->tanggal_terbit->translatedFormat('d M Y') }}
                                            </small>
                                        </div>
                                        <h5 class="card-title">
                                            <a href="{{ route('artikel.show', $artikel->slug) }}" class="text-decoration-none text-dark">
                                                {{ $artikel->judul }}
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            {{ Str::limit(strip_tags($artikel->deskripsi), 150) }}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0">
                                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-sm btn-outline-primary">
                                            Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $artikels->appends(request()->except('page'))->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="bi bi-newspaper display-1 text-muted"></i>
                        </div>
                        <h4>Artikel tidak ditemukan</h4>
                        <p class="text-muted">Tidak ada artikel yang sesuai dengan pencarian Anda.</p>
                        <a href="{{ route('artikel.index') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Artikel
                        </a>
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Kategori</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('artikel.index') }}" 
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ !request('kategori') ? 'active' : '' }}">
                            Semua Kategori
                            <span class="badge bg-primary rounded-pill">{{ $totalArtikel }}</span>
                        </a>
                        @foreach($categories as $category => $count)
                            <a href="{{ route('artikel.index', ['kategori' => $category]) }}" 
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('kategori') == $category ? 'active' : '' }}">
                                {{ $category }}
                                <span class="badge bg-primary rounded-pill">{{ $count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Artikel Populer</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach($popularArticles as $article)
                            <a href="{{ route('artikel.show', $article->slug) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $article->judul }}</h6>
                                </div>
                                <small class="text-muted">{{ $article->tanggal_terbit->diffForHumans() }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Tag Populer</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($popularTags as $tag)
                                <a href="{{ route('artikel.index', ['tag' => $tag->name]) }}" class="btn btn-sm btn-outline-secondary">
                                    {{ $tag->name }} <span class="badge bg-primary ms-1">{{ $tag->count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
