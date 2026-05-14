<x-app-layout>
    <style>
        /* Animasi Transisi Scroll */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Mengubah dominan warna gray ke emerald yang segar -->
    <div class="bg-emerald-50/40 min-h-screen pb-24 selection:bg-emerald-200">

        <!-- Section 1: Hero Banner (Paling Atas) -->
        <div class="relative w-full overflow-hidden bg-emerald-950 border-b-[6px] border-emerald-500 shadow-2xl">
            <div class="absolute inset-0">
                <img src="https://asset.kompas.com/crops/c2Ju8w6qugvLYEjwzEbvH0AWH28=/89x0:871x521/1200x800/data/photo/2017/10/12/1981795346.jpg" alt="Nigramesa Hero Background" class="w-full h-full object-cover opacity-120 mix-blend-overlay scale-105 animate-[pulse_10s_ease-in-out_infinite_alternate]">
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-emerald-900/30"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-36 lg:py-48 flex items-center justify-center text-center scroll-reveal revealed">
                <div class="max-w-4xl">
                    <span class="px-4 py-2 rounded-full bg-emerald-800/60 border border-emerald-400/50 text-emerald-100 font-bold uppercase tracking-widest text-xs mb-6 inline-block backdrop-blur-md shadow-sm">
                        Platform Ekosistem Terpadu
                    </span>

                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white tracking-tight mb-8 drop-shadow-lg leading-tight text-balance"
                        x-data="{
                            text: '',
                            fullText: 'Tanaman Hias & Pertanianmu',
                            index: 0,
                            init() {
                                setTimeout(() => this.type(), 600);
                            },
                            type() {
                                if (this.index < this.fullText.length) {
                                    this.text += this.fullText.charAt(this.index);
                                    this.index++;
                                    setTimeout(() => this.type(), 200);
                                }
                            }
                        }"
                    >
                        Tumbuhkan Impian <br>
                        <span class="text-emerald-400 drop-shadow-[0_0_15px_rgba(52,211,153,0.4)]" x-text="text"></span><span class="text-emerald-400 animate-pulse">|</span>
                    </h1>

                    <p class="text-lg md:text-2xl text-emerald-100/90 max-w-2xl mx-auto font-medium leading-relaxed mb-12 drop-shadow text-balance">
                        E-Commerce premium, ensiklopedia terlengkap, dan komunitas edukasi interaktif dalam satu platform canggih.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                        <a href="{{ route('katalog') }}" class="w-full sm:w-auto px-8 py-4 bg-emerald-500 hover:bg-emerald-400 text-emerald-950 font-black rounded-3xl shadow-[0_10px_30px_rgba(16,185,129,0.4)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.6)] transition-all hover:-translate-y-1 text-lg flex items-center justify-center gap-2">
                            Mulai Belanja
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </a>
                        <a href="{{ route('perawatan') }}" class="w-full sm:w-auto px-8 py-4 bg-emerald-900/40 hover:bg-emerald-800/60 border-2 border-emerald-400/50 text-white font-black rounded-3xl hover:border-emerald-300 transition-all backdrop-blur-md text-lg flex items-center justify-center gap-2">
                            Jelajahi Panduan
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 space-y-24">

            <!-- Section 2: Sorotan Edukasi -->
            @if($videoSorotanDashboard)
                <div class="-mt-32 relative z-20 scroll-reveal">
                    <div class="bg-white/90 backdrop-blur-xl rounded-[2.5rem] shadow-2xl p-6 md:p-8 border border-emerald-100/50 flex flex-col md:flex-row items-center gap-8 group hover:border-emerald-300 transition-colors">
                        <!-- Image Badge -->
                        <div class="w-full md:w-1/3 aspect-video md:aspect-auto md:h-48 rounded-3xl overflow-hidden relative shadow-inner shrink-0 bg-emerald-900">
                            <img src="{{ gambar_url($videoSorotanDashboard->cover_gambar, (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([A-Za-z0-9_-]{11})/', $videoSorotanDashboard->link_youtube, $matches) ? 'https://img.youtube.com/vi/' . $matches[1] . '/hqdefault.jpg' : 'https://placehold.co/800x450/064e3b/ffffff?font=montserrat&text=' . urlencode($videoSorotanDashboard->judul))) }}" alt="Video Edukasi" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4 bg-emerald-600/90 backdrop-blur-sm text-white px-4 py-2 rounded-xl text-xs font-black uppercase tracking-widest shadow-lg flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                VIDEO TERBARU
                            </div>
                            <div class="absolute bottom-4 right-4 bg-black/70 text-white px-3 py-1.5 rounded-xl text-xs font-black tracking-wider shadow-lg">
                                {{ $videoSorotanDashboard->durasi }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 flex flex-col">
                            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 uppercase tracking-widest mb-3 flex-wrap">
                                <span class="bg-emerald-100/50 px-3 py-1.5 rounded-lg text-emerald-800 border border-emerald-200">Koleksi Video Pembelajaran</span>
                                <span>&bull;</span>
                                <span>Oleh {{ $videoSorotanDashboard->pemateri }}</span>
                                <span>&bull;</span>
                                <span>{{ $videoSorotanDashboard->kategori }}</span>
                            </div>
                            <h2 class="text-2xl lg:text-3xl font-black text-emerald-950 mb-3 leading-tight line-clamp-2">
                                {{ $videoSorotanDashboard->judul }}
                            </h2>
                            <p class="text-emerald-700 font-medium mb-6 leading-relaxed line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($videoSorotanDashboard->deskripsi), 180) }}
                            </p>

                            <div class="mt-auto flex flex-wrap gap-3">
                                <span class="text-sm font-bold text-emerald-700 bg-emerald-50/80 backdrop-blur-sm w-max px-4 py-2 rounded-xl border border-emerald-100">
                                    Durasi: {{ $videoSorotanDashboard->durasi }}
                                </span>

                                @if($videoSorotanDashboard->is_premium)
                                    <span class="text-sm font-bold text-amber-700 bg-amber-50 backdrop-blur-sm w-max px-4 py-2 rounded-xl border border-amber-100">
                                        Konten Premium
                                    </span>
                                @endif
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('edukasi.index') }}" class="inline-flex items-center gap-2 text-sm font-black uppercase tracking-widest bg-emerald-100/50 text-emerald-700 hover:bg-emerald-700 hover:text-white border border-emerald-200 px-8 py-4 rounded-2xl transition-all shadow-sm">
                                    Buka Koleksi Edukasi
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section Fitur Platform -->
            <div class="scroll-reveal mb-16">
                <div class="flex flex-col text-center mb-10">
                    <h2 class="text-3xl font-black text-emerald-950">Fitur Unggulan Nigramesa</h2>
                    <p class="text-emerald-700/80 font-medium mt-3 max-w-2xl mx-auto">Platform terintegrasi yang menghadirkan pengalaman revolusioner untuk pengelolaan, pembelajaran, dan transaksi di dunia botani.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Fitur 1 -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                        <div class="w-14 h-14 bg-emerald-100/50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-2">E-Commerce Botani</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Katalog lengkap bibit unggul, pupuk organik, dan perlengkapan hortikultura kualitas terbaik.</p>
                    </div>

                    <!-- Fitur 2 -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                        <div class="w-14 h-14 bg-emerald-100/50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-2">Pustaka & Edukasi</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Akses literatur digital, ensiklopedia tanaman, dan video pembelajaran interaktif secara gratis.</p>
                    </div>

                    <!-- Fitur 3 -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                        <div class="w-14 h-14 bg-emerald-100/50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-2">Jadwal Perawatan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Manajemen log aktivitas dan pengingat otomatis untuk memastikan tanaman tumbuh maksimal.</p>
                    </div>

                    <!-- Fitur 4 -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl"></div>
                        <div class="w-14 h-14 bg-emerald-100/50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors relative z-10">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-2 relative z-10 flex items-center gap-2">NigraBot AI <span class="bg-amber-100 text-amber-600 text-[10px] uppercase px-2 py-0.5 rounded-full font-black tracking-widest">New</span></h3>
                        <p class="text-gray-500 text-sm leading-relaxed relative z-10">Asisten cerdas yang siap menjawab keluhan dan memberikan konsultasi pertanian 24/7.</p>
                    </div>
                </div>
            </div>

            <!-- Section 3: Produk Unggulan -->
            <div class="scroll-reveal">
                <div class="flex items-end justify-between border-b-2 border-emerald-200/60 pb-5 mb-8">
                    <div>
                        <h2 class="text-3xl font-black text-emerald-950 flex items-center gap-3">
                            <span class="w-10 h-10 rounded-2xl bg-emerald-200/50 text-emerald-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            Koleksi Terbaru
                        </h2>
                        <p class="text-emerald-700/80 font-medium mt-2">Belanja pasokan hijau dengan kualitas terkurasi tingkat tinggi.</p>
                    </div>
                    <a href="{{ route('katalog') }}" class="hidden sm:flex items-center gap-2 text-emerald-700 font-bold hover:text-emerald-800 transition-colors text-sm uppercase tracking-wider bg-emerald-100/60 px-5 py-2.5 rounded-xl border border-emerald-200/50 hover:bg-emerald-200">
                        Lihat Semua Katalog <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($produks as $produk)
                        <a href="{{ route('katalog.show', $produk->id) }}" class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-emerald-50 overflow-hidden flex flex-col h-full transform hover:-translate-y-2">
                            <div class="w-full aspect-[4/3] bg-emerald-50 relative overflow-hidden">
                                <img src="{{ gambar_url($produk->gambar, 'https://placehold.co/600x450/ecfdf5/064e3b?text=' . urlencode($produk->nama_produk)) }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/10 transition-colors"></div>
                                <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-lg text-\[10px\] font-black text-emerald-800 uppercase tracking-widest shadow-sm">
                                    {{ $produk->kategori }}
                                </div>
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <h3 class="text-lg font-black text-emerald-950 leading-tight mb-2 group-hover:text-emerald-600 transition-colors">{{ $produk->nama_produk }}</h3>
                                <div class="mt-auto pt-5 flex items-center justify-between">
                                    <span class="text-xl font-black text-emerald-600 tracking-tight">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center transition-colors shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-12 text-center text-emerald-600/60 font-medium">Belum ada produk dirilis.</div>
                    @endforelse
                </div>
            </div>

            <!-- Section 4: Ensiklopedia & Panduan -->
            <div class="scroll-reveal">
                <div class="flex items-end justify-between border-b-2 border-emerald-200/60 pb-5 mb-8">
                    <div>
                        <h2 class="text-3xl font-black text-emerald-950 flex items-center gap-3">
                            <span class="w-10 h-10 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H8l4-7v4h3l-4 7z"></path></svg>
                            </span>
                            Ensiklopedia Hijau
                        </h2>
                        <p class="text-emerald-700/80 font-medium mt-2">Panduan praktis merawat tanaman dari ahlinya.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($tanamans as $tanaman)
                        <a href="{{ route('perawatan.show', $tanaman->id) }}" class="bg-white rounded-[2.5rem] p-5 shadow-sm hover:shadow-2xl transition-all duration-300 border border-emerald-50 flex flex-col group h-full transform hover:-translate-y-2">
                            <div class="w-full aspect-[4/3] rounded-3xl overflow-hidden bg-emerald-50 relative mb-6 shadow-inner">
                                <img src="{{ gambar_url($tanaman->gambar, 'https://placehold.co/600x450/ecfdf5/064e3b?text=' . urlencode($tanaman->nama_tanaman)) }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="px-3 flex flex-col flex-1">
                                <span class="text-xs font-black text-amber-700 bg-amber-50 px-3 py-1.5 rounded-lg uppercase tracking-widest w-max mb-4 border border-amber-100/50">{{ $tanaman->kategori }}</span>
                                <h3 class="text-xl font-black text-emerald-950 leading-snug mb-5 group-hover:text-amber-600 transition-colors">{{ $tanaman->nama_tanaman }}</h3>

                                <div class="mt-auto grid grid-cols-2 gap-4 pt-5 border-t border-emerald-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                        </div>
                                        <div>
                                            <div class="text-[10px] font-black uppercase tracking-widest text-emerald-400">Air</div>
                                            <div class="text-xs font-bold text-emerald-900 truncate line-clamp-1 break-all" title="{{ $tanaman->kebutuhan_air }}">{{ $tanaman->kebutuhan_air }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                        </div>
                                        <div>
                                            <div class="text-[10px] font-black uppercase tracking-widest text-emerald-400">Cahaya</div>
                                            <div class="text-xs font-bold text-emerald-900 truncate line-clamp-1 break-all" title="{{ $tanaman->kebutuhan_cahaya }}">{{ $tanaman->kebutuhan_cahaya }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-12 text-center text-emerald-600/60 font-medium">Belum ada panduan tersedia.</div>
                    @endforelse
                </div>
            </div>

            <!-- Section 5: Ruang Baca -->
            <div class="scroll-reveal">
                <div class="flex items-end justify-between border-b-2 border-emerald-200/60 pb-5 mb-8">
                    <div>
                        <h2 class="text-3xl font-black text-emerald-950 flex items-center gap-3">
                            <span class="w-10 h-10 rounded-2xl bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l9 4v12l-9 4-9-4V6l9-4zm0 2.5l-6 2.6v9.8l6 2.6 6-2.6V7.1l-6-2.6z"></path></svg>
                            </span>
                            Ruang Baca & Referensi
                        </h2>
                        <p class="text-emerald-700/80 font-medium mt-2">Temukan publikasi jurnal dan artikel botani terbaru.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($literaturs as $literatur)
                        <a href="{{ route('perpustakaan.show', $literatur->id) }}" class="bg-white rounded-3xl shadow-sm hover:shadow-xl border border-emerald-50 p-5 flex items-center gap-5 group transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-1">
                            <!-- Book Cover -->
                            <div class="w-24 lg:w-28 aspect-[3/4] bg-emerald-50 rounded-2xl shadow-inner overflow-hidden shrink-0 relative">
                                <img src="{{ gambar_url($literatur->cover_gambar, 'https://placehold.co/300x400/ecfdf5/6366f1?font=montserrat&text=' . urlencode($literatur->tipe)) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>

                            <!-- Book Info -->
                            <div class="flex-1 min-w-0">
                                <div class="text-[10px] font-black text-indigo-700 bg-indigo-50 px-3 py-1 rounded-lg uppercase tracking-widest w-max mb-2">
                                    {{ $literatur->tipe }}
                                </div>
                                <h3 class="text-base font-black text-emerald-950 line-clamp-2 leading-snug mb-2 group-hover:text-indigo-600 transition-colors">{{ $literatur->judul }}</h3>
                                <p class="text-xs font-bold text-emerald-700/70 truncate mb-4">Oleh: {{ $literatur->penulis }}</p>
                                <div class="text-[10px] font-bold text-emerald-600/60 flex items-center gap-1.5 uppercase tracking-widest">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ \Carbon\Carbon::parse($literatur->tanggal_terbit)->format('M Y') }}
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-12 text-center text-emerald-600/60 font-medium">Buku dan literatur kosong.</div>
                    @endforelse
                </div>
            </div>

            <!-- Section 6: Berita Terkini (Ditambahkan Khusus) -->
            <div class="scroll-reveal">
                <div class="flex items-end justify-between border-b-2 border-emerald-200/60 pb-5 mb-8">
                    <div>
                        <h2 class="text-3xl font-black text-emerald-950 flex items-center gap-3">
                            <span class="w-10 h-10 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                            </span>
                            Berita & Artikel Terkini
                        </h2>
                        <p class="text-emerald-700/80 font-medium mt-2">Kabar terbaru lanskap pertanian dan inovasi tren botani modern.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Berita Card 1 -->
                    <a href="#" class="bg-white rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-300 border border-emerald-50 overflow-hidden flex flex-col group h-full transform hover:-translate-y-2">
                        <div class="w-full h-52 bg-emerald-100 relative overflow-hidden">
                            <img src="https://placehold.co/600x400/064e3b/10b981?font=montserrat&text=Smart+Farming" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-4 left-4 bg-teal-500 text-white px-3 py-1.5 rounded-lg text-xs font-black uppercase tracking-widest shadow-md">Teknologi</div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <p class="text-xs font-bold text-teal-600 mb-3 uppercase tracking-widest">9 April 2026</p>
                            <h3 class="text-xl font-black text-emerald-950 leading-snug mb-3 group-hover:text-teal-600 transition-colors line-clamp-2">Revolusi Sensor Tanah Berbasis AI Tingkatkan Panen Hingga 40%</h3>
                            <p class="text-sm text-emerald-800/70 font-medium line-clamp-3 mb-5 leading-relaxed">Penggunaan kecerdasan buatan dalam memantau kadar hara dan kelembaban tanah telah terbukti mereduksi biaya pasokan pupuk cair hidroponik secara drastis dalam uji coba terbaru di lapangan.</p>
                            <span class="mt-auto text-sm font-black text-teal-600 flex items-center gap-2 group-hover:gap-3 transition-all">Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                        </div>
                    </a>

                    <!-- Berita Card 2 -->
                    <a href="#" class="bg-white rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-300 border border-emerald-50 overflow-hidden flex flex-col group h-full transform hover:-translate-y-2">
                        <div class="w-full h-52 bg-emerald-100 relative overflow-hidden">
                            <img src="https://placehold.co/600x400/0f766e/14b8a6?font=montserrat&text=Urban+Farming" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-4 left-4 bg-teal-500 text-white px-3 py-1.5 rounded-lg text-xs font-black uppercase tracking-widest shadow-md">Lingkungan</div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <p class="text-xs font-bold text-teal-600 mb-3 uppercase tracking-widest">7 April 2026</p>
                            <h3 class="text-xl font-black text-emerald-950 leading-snug mb-3 group-hover:text-teal-600 transition-colors line-clamp-2">Tren Pertanian Perkotaan: Konsep Vertical Garden Atasi Keterbatasan Lahan</h3>
                            <p class="text-sm text-emerald-800/70 font-medium line-clamp-3 mb-5 leading-relaxed">Pemanfaatan lahan terbatas di tengah kota semakin marak lewat metode pertanian vertikal. Bukan hanya asri, konsep ini mendongkrak ketahanan pangan mandiri masyarakat urban.</p>
                            <span class="mt-auto text-sm font-black text-teal-600 flex items-center gap-2 group-hover:gap-3 transition-all">Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                        </div>
                    </a>

                    <!-- Berita Card 3 -->
                    <a href="#" class="bg-white rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-300 border border-emerald-50 overflow-hidden flex flex-col group h-full transform hover:-translate-y-2">
                        <div class="w-full h-52 bg-emerald-100 relative overflow-hidden">
                            <img src="https://placehold.co/600x400/047857/34d399?font=montserrat&text=Pupuk+Organik" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-4 left-4 bg-teal-500 text-white px-3 py-1.5 rounded-lg text-xs font-black uppercase tracking-widest shadow-md">Tips & Trik</div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <p class="text-xs font-bold text-teal-600 mb-3 uppercase tracking-widest">5 April 2026</p>
                            <h3 class="text-xl font-black text-emerald-950 leading-snug mb-3 group-hover:text-teal-600 transition-colors line-clamp-2">Mengolah Limbah Dapur Menjadi Ekstrak Pupuk Nabati Premium</h3>
                            <p class="text-sm text-emerald-800/70 font-medium line-clamp-3 mb-5 leading-relaxed">Jangan buang kulit pisang dan cangkang telur Anda! Racik sisa limbah organik rumah tangga Anda menjadi enzim penyubur tanaman monstera dan dedaunan hias indoor secara gratis.</p>
                            <span class="mt-auto text-sm font-black text-teal-600 flex items-center gap-2 group-hover:gap-3 transition-all">Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Script Observer JS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        // Optional: Berhenti mengawasi setelah animasi terpicu sekali
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15, // Picu saat 15% elemen terlihat
                rootMargin: "0px 0px -50px 0px"
            });

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>
</x-app-layout>
