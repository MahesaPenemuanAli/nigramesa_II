@extends('layouts.app')

@section('title', 'Ulasan Produk')

@push('styles')
<style>
    .reviews-wrapper {
        max-width: 720px;
        margin: 2.5rem auto;
        padding: 0 1rem;
        font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
    }

    /* Summary box */
    .rating-summary {
        background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
        border-radius: 20px;
        padding: 2rem;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 1.75rem;
    }
    .rating-big {
        text-align: center;
        flex-shrink: 0;
    }
    .rating-big .number {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1;
    }
    .rating-big .stars {
        font-size: 1.2rem;
        color: #f59e0b;
        margin: .4rem 0;
        letter-spacing: 2px;
    }
    .rating-big .total {
        font-size: .8rem;
        color: rgba(255,255,255,.6);
    }
    .rating-bars {
        flex: 1;
    }
    .rating-bar-row {
        display: flex;
        align-items: center;
        gap: .6rem;
        margin-bottom: .4rem;
        font-size: .8rem;
    }
    .rating-bar-row .label { width: 14px; text-align: right; color: rgba(255,255,255,.7); }
    .bar-track {
        flex: 1;
        height: 6px;
        background: rgba(255,255,255,.15);
        border-radius: 99px;
        overflow: hidden;
    }
    .bar-fill {
        height: 100%;
        background: #f59e0b;
        border-radius: 99px;
        transition: width .6s ease;
    }
    .rating-bar-row .count { width: 20px; color: rgba(255,255,255,.5); font-size: .75rem; }

    /* Review cards */
    .review-list { display: flex; flex-direction: column; gap: 1rem; }

    .review-item {
        background: #fff;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 2px 12px rgba(0,0,0,.06);
        border: 1px solid #f3f4f6;
    }
    .review-item-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: .85rem;
    }
    .reviewer-info {
        display: flex;
        align-items: center;
        gap: .75rem;
    }
    .reviewer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #0f3460, #1a1a2e);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: .9rem;
        flex-shrink: 0;
    }
    .reviewer-name {
        font-weight: 600;
        font-size: .9rem;
        color: #111827;
    }
    .reviewer-date {
        font-size: .78rem;
        color: #9ca3af;
        margin-top: 1px;
    }
    .review-stars { color: #f59e0b; font-size: 1rem; letter-spacing: 1px; }

    .review-komentar {
        font-size: .9rem;
        color: #374151;
        line-height: 1.65;
        margin-bottom: 1rem;
    }
    .review-komentar.empty { color: #d1d5db; font-style: italic; }

    /* Foto grid */
    .review-foto-grid {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
    }
    .review-foto-grid img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        transition: transform .2s;
        border: 1px solid #f3f4f6;
    }
    .review-foto-grid img:hover { transform: scale(1.05); }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.85);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }
    .lightbox.active { display: flex; }
    .lightbox img {
        max-width: 90vw;
        max-height: 85vh;
        border-radius: 12px;
        box-shadow: 0 20px 60px rgba(0,0,0,.5);
    }
    .lightbox-close {
        position: absolute;
        top: 1.25rem;
        right: 1.5rem;
        background: none;
        border: none;
        color: #fff;
        font-size: 1.75rem;
        cursor: pointer;
        line-height: 1;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #9ca3af;
    }
    .empty-state .icon { font-size: 3rem; margin-bottom: .75rem; }
    .empty-state p { font-size: .9rem; }

    /* Pagination */
    .pagination-wrapper { margin-top: 1.5rem; display: flex; justify-content: center; }
    .pagination-wrapper .pagination { gap: .3rem; display: flex; list-style: none; padding: 0; margin: 0; }
    .pagination-wrapper .page-link {
        padding: .45rem .8rem;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        font-size: .85rem;
        color: #374151;
        text-decoration: none;
        transition: background .15s;
    }
    .pagination-wrapper .page-item.active .page-link {
        background: #0f3460;
        border-color: #0f3460;
        color: #fff;
    }
    .pagination-wrapper .page-link:hover { background: #f9fafb; }

    @media (max-width: 500px) {
        .rating-summary { flex-direction: column; gap: 1rem; }
        .rating-big .number { font-size: 2.8rem; }
    }
</style>
@endpush

@section('content')
<div class="reviews-wrapper">

    {{-- Summary rating --}}
    @php
        $rounded = round($rataRating, 1);
        $fullStars = floor($rataRating);
        $starStr = str_repeat('★', $fullStars) . str_repeat('☆', 5 - $fullStars);

        // Hitung distribusi per bintang
        $dist = \App\Models\Review::where('produk_id', $produk_id)
            ->selectRaw('rating, count(*) as total')
            ->groupBy('rating')
            ->pluck('total', 'rating')
            ->toArray();
    @endphp

    <div class="rating-summary">
        <div class="rating-big">
            <div class="number">{{ $rounded ?: '0' }}</div>
            <div class="stars">{{ $starStr }}</div>
            <div class="total">{{ $totalReview }} ulasan</div>
        </div>
        <div class="rating-bars">
            @for($i = 5; $i >= 1; $i--)
                @php $cnt = $dist[$i] ?? 0; $pct = $totalReview > 0 ? ($cnt/$totalReview)*100 : 0; @endphp
                <div class="rating-bar-row">
                    <span class="label">{{ $i }}</span>
                    <div class="bar-track"><div class="bar-fill" style="width: {{ $pct }}%"></div></div>
                    <span class="count">{{ $cnt }}</span>
                </div>
            @endfor
        </div>
    </div>

    {{-- List review --}}
    @if($reviews->isEmpty())
        <div class="empty-state">
            <div class="icon">💬</div>
            <p>Belum ada ulasan untuk produk ini.</p>
        </div>
    @else
        <div class="review-list">
            @foreach($reviews as $review)
                <div class="review-item">
                    <div class="review-item-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">
                                {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <div class="reviewer-name">{{ $review->user->name ?? 'Pengguna' }}</div>
                                <div class="reviewer-date">{{ $review->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="review-stars">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </div>
                    </div>

                    @if($review->komentar)
                        <p class="review-komentar">{{ $review->komentar }}</p>
                    @else
                        <p class="review-komentar empty">Tidak ada komentar.</p>
                    @endif

                    @if($review->foto && count($review->foto))
                        <div class="review-foto-grid">
                            @foreach($review->foto as $foto)
                                <img src="{{ asset('storage/' . $foto) }}"
                                     alt="Foto review"
                                     onclick="openLightbox('{{ asset('storage/' . $foto) }}')">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $reviews->links() }}
        </div>
    @endif

</div>

{{-- Lightbox --}}
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <button class="lightbox-close" onclick="closeLightbox()">✕</button>
    <img id="lightboxImg" src="" alt="Foto review">
</div>
@endsection

@push('scripts')
<script>
    function openLightbox(src) {
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
</script>
@endpush