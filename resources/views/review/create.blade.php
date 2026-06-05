@extends('layouts.app')

@section('title', 'Tulis Review')

@push('styles')
<style>
    /* ===== REVIEW FORM STYLES ===== */
    .review-wrapper {
        max-width: 680px;
        margin: 2.5rem auto;
        padding: 0 1rem;
        font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
    }

    .review-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 30px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    /* Header produk */
    .review-header {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
        padding: 2rem;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }
    .review-header img {
        width: 72px;
        height: 72px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid rgba(255,255,255,0.2);
    }
    .review-header .produk-nama {
        font-size: 1.1rem;
        font-weight: 700;
        margin: 0 0 .25rem;
    }
    .review-header .pesanan-info {
        font-size: .82rem;
        color: rgba(255,255,255,.6);
    }

    /* Body */
    .review-body {
        padding: 2rem;
    }

    /* Star rating */
    .star-section label {
        display: block;
        font-weight: 600;
        font-size: .9rem;
        color: #374151;
        margin-bottom: .75rem;
    }
    .star-group {
        display: flex;
        flex-direction: row-reverse;
        gap: .35rem;
        width: fit-content;
    }
    .star-group input[type="radio"] {
        display: none;
    }
    .star-group label {
        font-size: 2.4rem;
        color: #d1d5db;
        cursor: pointer;
        transition: color .15s, transform .15s;
        margin: 0;
        line-height: 1;
    }
    .star-group label:hover,
    .star-group label:hover ~ label,
    .star-group input:checked ~ label {
        color: #f59e0b;
        transform: scale(1.1);
    }
    .rating-text {
        margin-top: .5rem;
        font-size: .82rem;
        color: #6b7280;
        min-height: 1.2em;
    }

    /* Divider */
    .form-divider {
        border: none;
        border-top: 1px solid #f3f4f6;
        margin: 1.5rem 0;
    }

    /* Komentar */
    .form-group label {
        display: block;
        font-weight: 600;
        font-size: .9rem;
        color: #374151;
        margin-bottom: .5rem;
    }
    .form-group textarea {
        width: 100%;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        padding: .875rem 1rem;
        font-size: .92rem;
        color: #111827;
        resize: vertical;
        min-height: 120px;
        transition: border-color .2s;
        outline: none;
        box-sizing: border-box;
    }
    .form-group textarea:focus {
        border-color: #0f3460;
        box-shadow: 0 0 0 3px rgba(15,52,96,.08);
    }
    .char-count {
        font-size: .78rem;
        color: #9ca3af;
        text-align: right;
        margin-top: .3rem;
    }

    /* Upload foto */
    .foto-label {
        display: flex;
        align-items: center;
        gap: .5rem;
        font-weight: 600;
        font-size: .9rem;
        color: #374151;
        margin-bottom: .75rem;
    }
    .foto-hint {
        font-size: .78rem;
        color: #9ca3af;
        font-weight: 400;
    }
    .foto-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 14px;
        padding: 1.75rem;
        text-align: center;
        cursor: pointer;
        transition: border-color .2s, background .2s;
        position: relative;
    }
    .foto-upload-area:hover {
        border-color: #0f3460;
        background: #f8faff;
    }
    .foto-upload-area input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    .foto-upload-area .upload-icon {
        font-size: 2rem;
        margin-bottom: .5rem;
        display: block;
    }
    .foto-upload-area p {
        margin: 0;
        font-size: .85rem;
        color: #6b7280;
    }
    .foto-upload-area .upload-cta {
        color: #0f3460;
        font-weight: 600;
    }

    /* Preview foto */
    #foto-preview {
        display: flex;
        flex-wrap: wrap;
        gap: .6rem;
        margin-top: 1rem;
    }
    .preview-item {
        position: relative;
        width: 80px;
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,.12);
    }
    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .preview-item .remove-foto {
        position: absolute;
        top: 3px;
        right: 3px;
        background: rgba(0,0,0,.55);
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: .7rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    /* Submit */
    .btn-submit {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #0f3460, #1a1a2e);
        color: #fff;
        border: none;
        border-radius: 14px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: opacity .2s, transform .15s;
        margin-top: 1.5rem;
        letter-spacing: .3px;
    }
    .btn-submit:hover {
        opacity: .9;
        transform: translateY(-1px);
    }
    .btn-submit:active {
        transform: translateY(0);
    }

    /* Already reviewed banner */
    .already-reviewed {
        background: #f0fdf4;
        border: 1.5px solid #bbf7d0;
        border-radius: 14px;
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        gap: .75rem;
        color: #166534;
        font-size: .9rem;
        font-weight: 500;
    }
    .already-reviewed span.icon { font-size: 1.4rem; }

    /* Alert */
    .alert-error {
        background: #fef2f2;
        border: 1.5px solid #fecaca;
        color: #991b1b;
        border-radius: 12px;
        padding: .875rem 1.25rem;
        font-size: .875rem;
        margin-bottom: 1.25rem;
    }

    @media (max-width: 480px) {
        .review-header { padding: 1.5rem; }
        .review-body { padding: 1.5rem; }
        .star-group label { font-size: 2rem; }
    }
</style>
@endpush

@section('content')
<div class="review-wrapper">

    {{-- Header produk --}}
    <div class="review-card">
        <div class="review-header">
            @if($detailPesanan->produk->foto ?? null)
                <img src="{{ asset('storage/' . $detailPesanan->produk->foto) }}" alt="{{ $detailPesanan->produk->nama }}">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($detailPesanan->produk->nama) }}&background=0f3460&color=fff&size=72" alt="">
            @endif
            <div>
                <p class="produk-nama">{{ $detailPesanan->produk->nama }}</p>
                <p class="pesanan-info">Pesanan #{{ $pesanan->id }} &nbsp;·&nbsp; {{ $pesanan->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="review-body">

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            {{-- Jika sudah pernah review --}}
            @if($existingReview)
                <div class="already-reviewed">
                    <span class="icon">✅</span>
                    <div>
                        Anda sudah memberikan review untuk produk ini.
                        Rating: <strong>{{ $existingReview->rating }}/5 ⭐</strong>
                    </div>
                </div>

            @else
                {{-- Form review --}}
                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data" id="reviewForm">
                    @csrf
                    <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                    <input type="hidden" name="produk_id" value="{{ $detailPesanan->produk_id }}">

                    {{-- Rating bintang --}}
                    <div class="star-section">
                        <label>Beri Penilaian <span style="color:#ef4444">*</span></label>
                        <div class="star-group">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                    {{ old('rating') == $i ? 'checked' : '' }} required>
                                <label for="star{{ $i }}" title="{{ $i }} bintang">★</label>
                            @endfor
                        </div>
                        <p class="rating-text" id="ratingText"></p>
                        @error('rating')
                            <p style="color:#ef4444;font-size:.82rem;margin-top:.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr class="form-divider">

                    {{-- Komentar --}}
                    <div class="form-group">
                        <label for="komentar">Tulis Ulasan <span style="color:#9ca3af;font-weight:400">(opsional)</span></label>
                        <textarea name="komentar" id="komentar" maxlength="1000"
                            placeholder="Bagaimana pengalaman Anda dengan produk ini? Ceritakan kualitas, ukuran, atau hal lainnya...">{{ old('komentar') }}</textarea>
                        <p class="char-count"><span id="charCount">0</span>/1000</p>
                        @error('komentar')
                            <p style="color:#ef4444;font-size:.82rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr class="form-divider">

                    {{-- Upload foto --}}
                    <div class="form-group">
                        <div class="foto-label">
                            📷 Tambah Foto
                            <span class="foto-hint">(maks. 5 foto, jpg/png/webp, 2MB)</span>
                        </div>
                        <div class="foto-upload-area" id="uploadArea">
                            <input type="file" name="foto[]" id="fotoInput"
                                accept="image/jpeg,image/png,image/webp" multiple>
                            <span class="upload-icon">🖼️</span>
                            <p><span class="upload-cta">Pilih foto</span> atau seret ke sini</p>
                            <p style="margin-top:.25rem;font-size:.78rem;color:#d1d5db">JPG, PNG, WEBP hingga 2MB</p>
                        </div>
                        <div id="foto-preview"></div>
                        @error('foto.*')
                            <p style="color:#ef4444;font-size:.82rem;margin-top:.4rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        ✨ Kirim Review
                    </button>
                </form>
            @endif

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // Label teks rating
    const ratingLabels = {
        1: '😞 Sangat Buruk',
        2: '😕 Kurang Memuaskan',
        3: '😐 Cukup',
        4: '😊 Bagus',
        5: '🤩 Luar Biasa!'
    };
    document.querySelectorAll('.star-group input').forEach(input => {
        input.addEventListener('change', function () {
            document.getElementById('ratingText').textContent = ratingLabels[this.value] || '';
        });
    });

    // Hitung karakter komentar
    const textarea = document.getElementById('komentar');
    const charCount = document.getElementById('charCount');
    if (textarea) {
        textarea.addEventListener('input', function () {
            charCount.textContent = this.value.length;
        });
    }

    // Preview foto
    const fotoInput = document.getElementById('fotoInput');
    const previewContainer = document.getElementById('foto-preview');
    let selectedFiles = [];

    if (fotoInput) {
        fotoInput.addEventListener('change', function () {
            const newFiles = Array.from(this.files);
            const combined = [...selectedFiles, ...newFiles].slice(0, 5);
            selectedFiles = combined;
            renderPreviews();
        });
    }

    function renderPreviews() {
        previewContainer.innerHTML = '';
        selectedFiles.forEach((file, idx) => {
            const reader = new FileReader();
            reader.onload = e => {
                const item = document.createElement('div');
                item.className = 'preview-item';
                item.innerHTML = `
                    <img src="${e.target.result}" alt="foto ${idx+1}">
                    <button type="button" class="remove-foto" data-idx="${idx}">✕</button>
                `;
                item.querySelector('.remove-foto').addEventListener('click', function () {
                    selectedFiles.splice(parseInt(this.dataset.idx), 1);
                    renderPreviews();
                });
                previewContainer.appendChild(item);
            };
            reader.readAsDataURL(file);
        });

        // Sync files ke input (buat DataTransfer baru)
        const dt = new DataTransfer();
        selectedFiles.forEach(f => dt.items.add(f));
        fotoInput.files = dt.files;
    }

    // Drag & drop
    const uploadArea = document.getElementById('uploadArea');
    if (uploadArea) {
        uploadArea.addEventListener('dragover', e => {
            e.preventDefault();
            uploadArea.style.borderColor = '#0f3460';
            uploadArea.style.background = '#f0f4ff';
        });
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.style.borderColor = '#d1d5db';
            uploadArea.style.background = '';
        });
        uploadArea.addEventListener('drop', e => {
            e.preventDefault();
            uploadArea.style.borderColor = '#d1d5db';
            uploadArea.style.background = '';
            const dropped = Array.from(e.dataTransfer.files).filter(f => f.type.startsWith('image/'));
            selectedFiles = [...selectedFiles, ...dropped].slice(0, 5);
            renderPreviews();
        });
    }
</script>
@endpush