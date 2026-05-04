<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white">
        <div class="mx-auto max-w-[1500px] px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
            <div class="mb-6 flex items-center gap-3">
                <a href="{{ route('edukasi.index') }}"
                   class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-slate-200 transition hover:border-emerald-400/40 hover:bg-emerald-500/10 hover:text-emerald-300">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>

                <div>
                    <p class="text-xs font-black uppercase tracking-[0.25em] text-emerald-300">Video Pembelajaran</p>
                    <h1 class="text-xl font-black text-white sm:text-2xl">Theater Mode Edukasi</h1>
                </div>
            </div>

            <div class="flex flex-col gap-8 xl:flex-row">
                <div class="w-full xl:w-[70%]">
                    <div class="aspect-video overflow-hidden rounded-2xl bg-black shadow-2xl shadow-emerald-950/30 ring-1 ring-white/10">
                        @php
                            $embedUrl = \App\Models\VideoPembelajaran::transformYoutubeUrlToEmbed($video->link_youtube);
                        @endphp

                        @if($embedUrl)
                            <iframe
                                src="{{ $embedUrl }}"
                                title="{{ $video->judul }}"
                                class="h-full w-full"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen
                            ></iframe>
                        @else
                            <div class="flex h-full items-center justify-center bg-slate-900 text-slate-400">
                                Link video belum tersedia.
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 rounded-[1.75rem] border border-white/10 bg-slate-900/80 p-6 shadow-xl sm:p-8">
                        <div class="flex flex-col gap-4 border-b border-white/10 pb-6">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="rounded-full border border-emerald-400/30 bg-emerald-500/15 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-emerald-300">
                                    {{ $video->kategori }}
                                </span>

                                <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-bold text-slate-300">
                                    {{ $video->durasi }}
                                </span>

                                @if($video->is_premium)
                                    <span class="rounded-full border border-yellow-400/30 bg-yellow-500/15 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-yellow-300">
                                        Premium
                                    </span>
                                @endif
                            </div>

                            <div>
                                <h2 class="text-2xl font-black leading-tight text-white sm:text-3xl lg:text-4xl">
                                    {{ $video->judul }}
                                </h2>
                                <p class="mt-3 text-sm font-semibold uppercase tracking-[0.2em] text-emerald-300/90">
                                    Pemateri: {{ $video->pemateri }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 text-slate-300 leading-8">
                            {!! nl2br(e($video->deskripsi)) !!}
                        </div>
                    </div>
                </div>

                <aside class="w-full xl:w-[30%]">
                    <div class="sticky top-24 rounded-[1.75rem] border border-white/10 bg-slate-900/80 p-5 shadow-xl sm:p-6">
                        <div class="mb-5 flex items-center justify-between gap-3 border-b border-white/10 pb-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-emerald-300">Up Next</p>
                                <h3 class="mt-1 text-xl font-black text-white">Rekomendasi Video</h3>
                            </div>

                            <span class="rounded-full bg-white/5 px-3 py-1 text-xs font-bold text-slate-300">
                                {{ $videoRekomendasi->count() }} item
                            </span>
                        </div>

                        <div class="space-y-4">
                            @forelse($videoRekomendasi as $rekomendasi)
                                <a href="{{ route('edukasi.show', $rekomendasi) }}"
                                   class="group flex gap-4 rounded-2xl border border-white/5 bg-white/[0.03] p-3 transition hover:border-emerald-400/20 hover:bg-emerald-500/5">
                                    <div class="relative w-32 shrink-0 overflow-hidden rounded-xl bg-slate-800 sm:w-40">
                                        <div class="aspect-video">
                                            @php
                                                $thumbnailUrl = null;

                                                if (empty($rekomendasi->cover_gambar)) {
                                                    $embedUrl = \App\Models\VideoPembelajaran::transformYoutubeUrlToEmbed($rekomendasi->link_youtube);

                                                    if (str_contains($embedUrl, '/embed/')) {
                                                        $videoId = \Illuminate\Support\Str::afterLast($embedUrl, '/embed/');
                                                        $videoId = str_contains($videoId, '?')
                                                            ? \Illuminate\Support\Str::before($videoId, '?')
                                                            : $videoId;

                                                        if (!empty($videoId)) {
                                                            $thumbnailUrl = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
                                                        }
                                                    }
                                                }
                                            @endphp
                                            <img
                                                src="{{ gambar_url($rekomendasi->cover_gambar, $thumbnailUrl ?: 'https://placehold.co/640x360/0f172a/ffffff?font=montserrat&text=' . urlencode($rekomendasi->judul)) }}"
                                                alt="{{ $rekomendasi->judul }}"
                                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                            >
                                        </div>

                                        <div class="absolute bottom-2 right-2 rounded-md bg-black/80 px-2 py-1 text-[10px] font-bold text-white">
                                            {{ $rekomendasi->durasi }}
                                        </div>
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <p class="text-[11px] font-black uppercase tracking-[0.18em] text-emerald-300">
                                            {{ $rekomendasi->kategori }}
                                        </p>

                                        <h4 class="mt-1 line-clamp-2 text-sm font-black leading-6 text-white transition group-hover:text-emerald-300 sm:text-base">
                                            {{ $rekomendasi->judul }}
                                        </h4>

                                        <p class="mt-2 line-clamp-1 text-sm text-slate-400">
                                            {{ $rekomendasi->pemateri }}
                                        </p>
                                    </div>
                                </a>
                            @empty
                                <div class="rounded-2xl border border-dashed border-white/10 bg-white/[0.03] px-4 py-8 text-center text-sm text-slate-400">
                                    Belum ada rekomendasi video lainnya.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
