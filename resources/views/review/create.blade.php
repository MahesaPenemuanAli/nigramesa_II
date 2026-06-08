<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Review') }}
        </h2>
    </x-slot>

    <style>
        .review-page {
            min-height: calc(100vh - 96px);
            background: #f8fafc;
            padding: 48px 16px;
        }

        .review-shell {
            max-width: 760px;
            margin: 0 auto;
        }

        .review-card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            box-shadow: 0 22px 45px rgba(15, 23, 42, .08);
        }

        .review-header {
            display: grid;
            grid-template-columns: 92px 1fr;
            gap: 20px;
            align-items: center;
            padding: 28px;
            color: #fff;
            background: linear-gradient(135deg, #065f46 0%, #064e3b 55%, #0f172a 100%);
        }

        .review-product-image {
            width: 92px;
            height: 92px;
            border-radius: 16px;
            object-fit: cover;
            background: #ecfdf5;
            border: 2px solid rgba(255, 255, 255, .28);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .18);
        }

        .review-kicker {
            margin: 0 0 8px;
            color: #a7f3d0;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .review-title {
            margin: 0;
            color: #fff;
            font-size: 24px;
            font-weight: 900;
            line-height: 1.2;
        }

        .review-meta {
            margin: 8px 0 0;
            color: rgba(255, 255, 255, .78);
            font-size: 14px;
            font-weight: 600;
        }

        .review-body {
            padding: 32px;
        }

        .review-section {
            padding: 0 0 28px;
            margin: 0 0 28px;
            border-bottom: 1px solid #eef2f7;
        }

        .review-section:last-child {
            padding-bottom: 0;
            margin-bottom: 0;
            border-bottom: 0;
        }

        .review-label-row {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 12px;
        }

        .review-label {
            color: #111827;
            font-size: 15px;
            font-weight: 800;
        }

        .review-required {
            color: #ef4444;
        }

        .review-hint {
            color: #94a3b8;
            font-size: 13px;
            font-weight: 600;
        }

        .star-group {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 6px;
            width: fit-content;
        }

        .star-group input {
            display: none;
        }

        .star-group label {
            margin: 0;
            color: #cbd5e1;
            cursor: pointer;
            font-size: 42px;
            line-height: 1;
            transition: color .15s ease, transform .15s ease;
        }

        .star-group label:hover,
        .star-group label:hover ~ label,
        .star-group input:checked ~ label {
            color: #f59e0b;
            transform: translateY(-1px);
        }

        .rating-text {
            min-height: 22px;
            margin: 10px 0 0;
            color: #047857;
            font-size: 14px;
            font-weight: 800;
        }

        .review-textarea {
            display: block;
            width: 100%;
            min-height: 138px;
            resize: vertical;
            border: 1px solid #dbe3ef;
            border-radius: 16px;
            padding: 16px 18px;
            color: #111827;
            font-size: 15px;
            line-height: 1.7;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        .review-textarea:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, .12);
        }

        .char-count {
            margin-top: 8px;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 700;
            text-align: right;
        }

        .foto-upload-area {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 150px;
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            background: #f8fafc;
            cursor: pointer;
            text-align: center;
            transition: border-color .15s ease, background .15s ease;
        }

        .foto-upload-area:hover,
        .foto-upload-area.is-dragging {
            border-color: #10b981;
            background: #ecfdf5;
        }

        .foto-upload-area input {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            margin-bottom: 10px;
            border-radius: 14px;
            background: #d1fae5;
            color: #047857;
        }

        .upload-title {
            margin: 0;
            color: #0f172a;
            font-size: 14px;
            font-weight: 800;
        }

        .upload-subtitle {
            margin: 4px 0 0;
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
        }

        #foto-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(88px, 1fr));
            gap: 12px;
            margin-top: 16px;
        }

        .preview-item {
            position: relative;
            aspect-ratio: 1;
            overflow: hidden;
            border-radius: 14px;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
        }

        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-foto {
            position: absolute;
            top: 6px;
            right: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border: 0;
            border-radius: 999px;
            background: rgba(15, 23, 42, .76);
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 900;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 52px;
            border: 0;
            border-radius: 16px;
            background: #059669;
            color: #fff;
            cursor: pointer;
            font-size: 15px;
            font-weight: 900;
            letter-spacing: .01em;
            box-shadow: 0 12px 24px rgba(5, 150, 105, .22);
            transition: background .15s ease, transform .15s ease, box-shadow .15s ease;
        }

        .btn-submit:hover {
            background: #047857;
            transform: translateY(-1px);
            box-shadow: 0 16px 30px rgba(5, 150, 105, .28);
        }

        .already-reviewed,
        .alert-error {
            border-radius: 16px;
            padding: 16px 18px;
            font-size: 14px;
            font-weight: 700;
        }

        .already-reviewed {
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #166534;
        }

        .alert-error {
            margin-bottom: 20px;
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #991b1b;
        }

        .field-error {
            margin: 8px 0 0;
            color: #ef4444;
            font-size: 13px;
            font-weight: 700;
        }

        @media (max-width: 640px) {
            .review-page {
                padding: 24px 12px;
            }

            .review-header {
                grid-template-columns: 72px 1fr;
                gap: 14px;
                padding: 20px;
            }

            .review-product-image {
                width: 72px;
                height: 72px;
                border-radius: 14px;
            }

            .review-title {
                font-size: 20px;
            }

            .review-body {
                padding: 22px;
            }

            .star-group label {
                font-size: 34px;
            }
        }
    </style>

    <div class="review-page">
        <div class="review-shell">
            <div class="review-card">
                @php
                    $produk = $detailPesanan->produk;
                    $fallbackImage = 'https://ui-avatars.com/api/?name=' . urlencode($produk->nama_produk) . '&background=ecfdf5&color=047857&bold=true&size=128';
                @endphp

                <div class="review-header">
                    <img
                        src="{{ gambar_url($produk->gambar, $fallbackImage) }}"
                        alt="{{ $produk->nama_produk }}"
                        class="review-product-image"
                    >
                    <div>
                        <p class="review-kicker">Review produk</p>
                        <h3 class="review-title">{{ $produk->nama_produk }}</h3>
                        <p class="review-meta">Pesanan #{{ $pesanan->id }} · {{ $pesanan->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="review-body">
                    @if(session('error'))
                        <div class="alert-error">{{ session('error') }}</div>
                    @endif

                    @if($existingReview)
                        <div class="already-reviewed">
                            Anda sudah memberikan review untuk produk ini. Rating: <strong>{{ $existingReview->rating }}/5</strong>
                        </div>
                    @else
                        <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data" id="reviewForm">
                            @csrf
                            <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                            <input type="hidden" name="produk_id" value="{{ $detailPesanan->produk_id }}">

                            <section class="review-section">
                                <div class="review-label-row">
                                    <label class="review-label">Beri Penilaian <span class="review-required">*</span></label>
                                </div>

                                <div class="star-group" aria-label="Rating produk">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                                        <label for="star{{ $i }}" title="{{ $i }} bintang">&#9733;</label>
                                    @endfor
                                </div>
                                <p class="rating-text" id="ratingText"></p>
                                @error('rating')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </section>

                            <section class="review-section">
                                <div class="review-label-row">
                                    <label for="komentar" class="review-label">Tulis Ulasan</label>
                                    <span class="review-hint">opsional</span>
                                </div>
                                <textarea
                                    name="komentar"
                                    id="komentar"
                                    maxlength="1000"
                                    class="review-textarea"
                                    placeholder="Bagaimana pengalaman Anda dengan produk ini? Ceritakan kualitas, ukuran, atau hal lainnya..."
                                >{{ old('komentar') }}</textarea>
                                <p class="char-count"><span id="charCount">0</span>/1000</p>
                                @error('komentar')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </section>

                            <section class="review-section">
                                <div class="review-label-row">
                                    <label class="review-label">Tambah Foto</label>
                                    <span class="review-hint">maks. 5 foto, JPG/PNG/WEBP, 2MB</span>
                                </div>
                                <div class="foto-upload-area" id="uploadArea">
                                    <input type="file" name="foto[]" id="fotoInput" accept="image/jpeg,image/png,image/webp" multiple>
                                    <div>
                                        <span class="upload-icon">
                                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4a2 2 0 012.8 0l1.2 1.2 2.2-2.2a2 2 0 012.8 0l3 3M4 6h16v12H4zM8 8h.01"/>
                                            </svg>
                                        </span>
                                        <p class="upload-title">Pilih foto atau seret ke sini</p>
                                        <p class="upload-subtitle">Foto membantu pembeli lain melihat kondisi produk.</p>
                                    </div>
                                </div>
                                <div id="foto-preview"></div>
                                @error('foto.*')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </section>

                            <button type="submit" class="btn-submit" id="submitBtn">
                                Kirim Review
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        const ratingLabels = {
            1: 'Sangat buruk',
            2: 'Kurang memuaskan',
            3: 'Cukup',
            4: 'Bagus',
            5: 'Luar biasa'
        };

        document.querySelectorAll('.star-group input').forEach(input => {
            input.addEventListener('change', function () {
                const ratingText = document.getElementById('ratingText');
                if (ratingText) ratingText.textContent = ratingLabels[this.value] || '';
            });

            if (input.checked) {
                const ratingText = document.getElementById('ratingText');
                if (ratingText) ratingText.textContent = ratingLabels[input.value] || '';
            }
        });

        const textarea = document.getElementById('komentar');
        const charCount = document.getElementById('charCount');
        if (textarea && charCount) {
            charCount.textContent = textarea.value.length;
            textarea.addEventListener('input', function () {
                charCount.textContent = this.value.length;
            });
        }

        const fotoInput = document.getElementById('fotoInput');
        const previewContainer = document.getElementById('foto-preview');
        const uploadArea = document.getElementById('uploadArea');
        let selectedFiles = [];

        if (fotoInput && previewContainer) {
            fotoInput.addEventListener('change', function () {
                selectedFiles = [...selectedFiles, ...Array.from(this.files)].slice(0, 5);
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
                        <img src="${e.target.result}" alt="Foto review ${idx + 1}">
                        <button type="button" class="remove-foto" data-idx="${idx}" aria-label="Hapus foto">&times;</button>
                    `;
                    item.querySelector('.remove-foto').addEventListener('click', function () {
                        selectedFiles.splice(parseInt(this.dataset.idx), 1);
                        renderPreviews();
                    });
                    previewContainer.appendChild(item);
                };
                reader.readAsDataURL(file);
            });

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fotoInput.files = dataTransfer.files;
        }

        if (uploadArea) {
            uploadArea.addEventListener('dragover', event => {
                event.preventDefault();
                uploadArea.classList.add('is-dragging');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('is-dragging');
            });

            uploadArea.addEventListener('drop', event => {
                event.preventDefault();
                uploadArea.classList.remove('is-dragging');
                const dropped = Array.from(event.dataTransfer.files).filter(file => file.type.startsWith('image/'));
                selectedFiles = [...selectedFiles, ...dropped].slice(0, 5);
                renderPreviews();
            });
        }
    </script>
</x-app-layout>
