<x-app-layout>
    @php
        $videoThumbnail = function ($video, $fallbackText = null) {
            if (!empty($video->cover_gambar)) {
                return gambar_url(
                    $video->cover_gambar,
                    'https://placehold.co/800x450/0f172a/ffffff?font=montserrat&text=' . urlencode($fallbackText ?: $video->judul)
                );
            }

            $url = $video->link_youtube ?? '';
            $videoId = null;

            if (preg_match('/youtu\.be\/([^\?\&\/]+)/', $url, $matches)) {
                $videoId = $matches[1];
            } elseif (preg_match('/v=([^\&]+)/', $url, $matches)) {
                $videoId = $matches[1];
            } elseif (preg_match('/embed\/([^\?\&\/]+)/', $url, $matches)) {
                $videoId = $matches[1];
            } elseif (preg_match('/shorts\/([^\?\&\/]+)/', $url, $matches)) {
                $videoId = $matches[1];
            }

            if ($videoId) {
                return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
            }

            return 'https://placehold.co/800x450/0f172a/ffffff?font=montserrat&text=' . urlencode($fallbackText ?: $video->judul);
        };
    @endphp

    <div class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
            @if($videoSorotan)
                <section class="relative overflow-hidden rounded-[2rem] border border-emerald-500/20 bg-slate-900 shadow-2xl shadow-emerald-950/30">
                    <div class="absolute inset-0">
                        <img
                            src="{{ $videoThumbnail($videoSorotan, $videoSorotan->judul) }}"
                            alt="{{ $videoSorotan->judul }}"
                            class="h-full w-full object-cover opacity-30"
                        >
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-emerald-950/40"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                    </div>

                    <div class="relative grid items-center gap-8 px-6 py-10 sm:px-8 lg:grid-cols-[1.15fr_0.85fr] lg:px-12 lg:py-14">
                        <div>
                            <div class="mb-4 flex flex-wrap items-center gap-3 text-xs font-black uppercase tracking-[0.2em]">
                                <span class="rounded-full border border-emerald-400/30 bg-emerald-500/15 px-4 py-2 text-emerald-300">
                                    Sorotan Utama
                                </span>
                                <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-slate-200">
                                    {{ $videoSorotan->kategori }}
                                </span>
                                <span class="rounded-full border border-white/10 bg-black/30 px-4 py-2 text-slate-300">
                                    {{ $videoSorotan->durasi }}
                                </span>
                                @if($videoSorotan->is_premium)
                                    <span class="rounded-full border border-yellow-400/30 bg-yellow-500/15 px-4 py-2 text-yellow-300">
                                        Premium
                                    </span>
                                @endif
                            </div>

                            <h1 class="max-w-3xl text-3xl font-black leading-tight text-white sm:text-4xl lg:text-5xl">
                                {{ $videoSorotan->judul }}
                            </h1>

                            <p class="mt-3 text-sm font-semibold uppercase tracking-[0.18em] text-emerald-300/90">
                                Oleh {{ $videoSorotan->pemateri }}
                            </p>

                            <p class="mt-6 max-w-2xl text-sm leading-7 text-slate-200 sm:text-base">
                                {{ \Illuminate\Support\Str::limit(strip_tags($videoSorotan->deskripsi), 220) }}
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a
                                    href="{{ route('edukasi.show', $videoSorotan) }}"
                                    class="inline-flex items-center gap-3 rounded-2xl bg-emerald-500 px-6 py-4 text-sm font-black uppercase tracking-[0.18em] text-slate-950 transition hover:bg-emerald-400 hover:shadow-xl hover:shadow-emerald-500/20"
                                >
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5.14v14l11-7-11-7z"></path>
                                    </svg>
                                    Mulai Menonton
                                </a>

                                <div class="inline-flex items-center rounded-2xl border border-white/10 bg-white/5 px-5 py-4 text-sm font-semibold text-slate-200">
                                    {{ $semuaVideo->count() }} Video Tersedia
                                </div>
                            </div>
                        </div>

                        <a
                            href="{{ route('edukasi.show', $videoSorotan) }}"
                            class="group block overflow-hidden rounded-[1.75rem] border border-white/10 bg-slate-900/70 shadow-2xl"
                        >
                            <div class="relative aspect-video overflow-hidden">
                                <img
                                    src="{{ $videoThumbnail($videoSorotan, $videoSorotan->judul) }}"
                                    alt="{{ $videoSorotan->judul }}"
                                    class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500/90 text-slate-950 shadow-2xl transition group-hover:scale-110">
                                        <svg class="ml-1 h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5.14v14l11-7-11-7z"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="absolute bottom-4 right-4 rounded-lg bg-black/80 px-3 py-1.5 text-xs font-bold text-white">
                                    {{ $videoSorotan->durasi }}
                                </div>
                            </div>
                        </a>
                    </div>
                </section>
            @else
                <section class="rounded-[2rem] border border-dashed border-emerald-500/20 bg-slate-900/80 px-6 py-16 text-center shadow-xl">
                    <h1 class="text-3xl font-black text-white">Koleksi Video Pembelajaran Belum Tersedia</h1>
                    <p class="mt-4 text-slate-300">Tambahkan data video terlebih dahulu agar halaman edukasi dapat menampilkan konten.</p>
                </section>
            @endif

            @if($videoPerKategori->isNotEmpty())
                <section class="mt-8 flex flex-wrap gap-3">
                    @foreach($videoPerKategori->keys() as $kategori)
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-slate-300">
                            {{ $kategori }}
                        </span>
                    @endforeach
                </section>
            @endif

            @if($semuaVideo->isNotEmpty())
                <section class="mt-12">
                    <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <h2 class="text-2xl font-black text-white sm:text-3xl">Koleksi Video Pembelajaran</h2>
                            <p class="mt-2 text-sm text-slate-400">
                                Jelajahi materi belajar pilihan dengan tampilan yang lebih ringkas dan nyaman.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
                        @foreach($semuaVideo as $video)
                            <a
                                href="{{ route('edukasi.show', $video) }}"
                                class="group overflow-hidden rounded-[1.5rem] border border-white/10 bg-slate-900/80 shadow-lg transition duration-300 hover:-translate-y-1 hover:border-emerald-400/30 hover:shadow-2xl hover:shadow-emerald-950/30"
                            >
                                <div class="relative aspect-video overflow-hidden bg-slate-800">
                                    <img
                                        src="{{ $videoThumbnail($video, $video->judul) }}"
                                        alt="{{ $video->judul }}"
                                        class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>

                                    <div class="absolute left-3 top-3 flex flex-wrap gap-2">
                                        <span class="rounded-full bg-emerald-500/90 px-2.5 py-1 text-[10px] font-black uppercase tracking-[0.18em] text-slate-950">
                                            {{ $video->kategori }}
                                        </span>

                                        @if($video->is_premium)
                                            <span class="rounded-full bg-yellow-400/90 px-2.5 py-1 text-[10px] font-black uppercase tracking-[0.18em] text-slate-950">
                                                Premium
                                            </span>
                                        @endif
                                    </div>

                                    <div class="absolute bottom-3 right-3 rounded-lg bg-black/80 px-2.5 py-1 text-[11px] font-bold text-white">
                                        {{ $video->durasi }}
                                    </div>
                                </div>

                                <div class="p-4">
                                    <h3 class="line-clamp-2 min-h-[3.25rem] text-sm font-black leading-6 text-white transition group-hover:text-emerald-300 sm:text-base">
                                        {{ $video->judul }}
                                    </h3>
                                    <p class="mt-2 text-sm font-medium text-slate-400">
                                        {{ $video->pemateri }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-app-layout>
