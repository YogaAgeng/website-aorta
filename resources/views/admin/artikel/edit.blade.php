@extends('layouts.admin')

@section('title', 'Edit Artikel: ' . $artikel->judul)

@section('header')
    <h5 class="mb-0">Edit Artikel: {{ $artikel->judul }}</h5>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Singkat <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                     id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten <span class="text-danger">*</span></label>
                            <textarea class="form-control summernote @error('konten') is-invalid @enderror" 
                                     id="konten" name="konten" rows="10" required>{{ old('konten', $artikel->konten) }}</textarea>
                            @error('konten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Thumbnail</h6>
                                <div class="mb-3">
                                    @if($artikel->gambar)
                                        <div class="image-preview mb-2">
                                            <img id="imagePreview" src="{{ asset('storage/' . $artikel->gambar) }}" alt="Preview" class="img-fluid rounded">
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="hapus_gambar" name="hapus_gambar" value="1">
                                            <label class="form-check-label" for="hapus_gambar">
                                                Hapus gambar saat disimpan
                                            </label>
                                        </div>
                                    @else
                                        <div class="image-preview mb-2" style="display: none;">
                                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded">
                                        </div>
                                    @endif
                                    
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                           id="gambar" name="gambar" accept="image/*" onchange="previewImage(this)">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Ukuran maksimal 2MB. Format: JPG, JPEG, PNG, GIF</div>
                                </div>

                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" 
                                           id="kategori" name="kategori" value="{{ old('kategori', $artikel->kategori) }}" required>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Gunakan koma (,) untuk memisahkan kategori</div>
                                </div>

                                <div class="mb-3">
                                    <label for="penulis" class="form-label">Penulis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                                           id="penulis" name="penulis" value="{{ old('penulis', $artikel->penulis) }}" required>
                                    @error('penulis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" 
                                               id="draft" name="draft" value="1" {{ old('draft', $artikel->draft) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="draft">Simpan sebagai draft</label>
                                    </div>
                                </div>

                                @if($artikel->tanggal_terbit)
                                    <div class="mb-3">
                                        <label class="form-label">Diterbitkan pada</label>
                                        <p class="form-control-static">{{ $artikel->tanggal_terbit->format('d F Y H:i') }}</p>
                                    </div>
                                @endif

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Perbarui Artikel
                                    </button>
                                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left me-1"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewContainer = document.querySelector('.image-preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            previewContainer.style.display = 'none';
        }
    }

    // Initialize Summernote
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 400,
            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
        });

        function uploadImage(file) {
            const formData = new FormData();
            formData.append('image', file);
            
            $.ajax({
                url: '{{ route("admin.upload.image") }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    const image = $('<img>').attr('src', response.url).addClass('img-fluid');
                    $('.summernote').summernote('insertNode', image[0]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + ': ' + errorThrown);
                    alert('Gagal mengunggah gambar. Silakan coba lagi.');
                }
            });
        }
    });
</script>
@endpush
