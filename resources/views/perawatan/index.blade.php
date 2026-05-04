<x-app-layout>
    <div class="bg-slate-50 min-h-screen">
        <!-- Hero Section -->
        <div class="bg-emerald-600 relative overflow-hidden py-24 shadow-inner">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/leaves-pattern.png')] opacity-10"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-md">Ensiklopedia Perawatan Tanaman</h1>
                <p class="text-emerald-100 text-lg md:text-xl max-w-2xl mx-auto mb-10 font-medium">Temukan panduan merawat berbagai macam tanaman, mulai dari tanaman hias hingga sayuran favorit Anda.</p>
                
                <!-- Search Bar -->
                <form action="{{ route('perawatan') }}" method="GET" class="max-w-3xl mx-auto">
                    <div class="relative flex items-center w-full h-16 rounded-full focus-within:shadow-lg bg-white overflow-hidden border-4 border-emerald-500/30 transition-all shadow-sm">
                        <div class="grid place-items-center h-full w-16 text-gray-400">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input class="peer h-full w-full outline-none text-gray-700 font-medium bg-transparent border-0 focus:ring-0 text-lg pr-4" type="text" name="search" placeholder="Cari nama tanaman..." value="{{ request('search') }}" />
                        <button type="submit" class="h-full px-8 bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-colors">Cari</button>
                    </div>
                    @if(request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                </form>
            </div>
        </div>

        <!-- Pill Categories -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-20">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex flex-wrap justify-center gap-3">
                <a href="{{ route('perawatan', ['search' => request('search')]) }}" class="px-6 py-2.5 rounded-full font-bold text-sm transition-all shadow-sm {{ !request('kategori') || request('kategori') == 'Semua' ? 'bg-emerald-600 text-white shadow-emerald-200 ring-2 ring-emerald-600 ring-offset-2' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Semua</a>
                @foreach($kategoris as $kat)
                    <a href="{{ route('perawatan', ['kategori' => $kat, 'search' => request('search')]) }}" class="px-6 py-2.5 rounded-full font-bold text-sm transition-all shadow-sm {{ request('kategori') == $kat ? 'bg-emerald-600 text-white shadow-emerald-200 ring-2 ring-emerald-600 ring-offset-2' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">{{ $kat }}</a>
                @endforeach
            </div>
        </div>

        <!-- Grid Container -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($tanamans as $tanaman)
                    <div class="bg-white rounded-[2rem] shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group relative">
                        <div class="relative h-64 overflow-hidden bg-gray-100">
                            <img src="{{ gambar_url($tanaman->gambar, 'https://placehold.co/800x600/10b981/ffffff?text=' . urlencode($tanaman->nama_tanaman)) }}" alt="{{ $tanaman->nama_tanaman }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 right-4 backdrop-blur-md bg-white/90 px-4 py-1.5 rounded-full text-xs font-black text-emerald-700 shadow-sm uppercase tracking-wide">
                                {{ $tanaman->kategori }}
                            </div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <h2 class="text-2xl font-black text-gray-900 mb-4">{{ $tanaman->nama_tanaman }}</h2>
                            
                            <!-- Badges Air & Cahaya -->
                            <div class="flex flex-col gap-3 mb-8 bg-gray-50/50 p-4 rounded-2xl border border-gray-100">
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 flex-shrink-0 mt-0.5">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                    </div>
                                    <div class="flex flex-col border-b border-gray-200/60 pb-3 w-full">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Air</span>
                                        <span class="text-sm font-semibold text-gray-700 line-clamp-1 truncate">{{ $tanaman->kebutuhan_air }}</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-500 flex-shrink-0 mt-0.5">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Cahaya</span>
                                        <span class="text-sm font-semibold text-gray-700 line-clamp-1 truncate">{{ $tanaman->kebutuhan_cahaya }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="{{ route('perawatan.show', $tanaman->id) }}" class="mt-auto block w-full py-3.5 bg-white hover:bg-emerald-600 text-emerald-600 hover:text-white font-black text-center rounded-xl transition-all duration-300 border-2 border-emerald-100 hover:border-emerald-600 shadow-sm">
                                Lihat Cara Merawat
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-16 rounded-[2.5rem] text-center border border-gray-100 shadow-sm flex flex-col items-center">
                        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Tanaman tidak ditemukan</h3>
                        <p class="text-gray-500 max-w-sm">Maaf, kami tidak dapat menemukan ensiklopedia untuk kriteria pencarian tersebut.</p>
                        <a href="{{ route('perawatan') }}" class="inline-block mt-8 px-8 py-3 bg-emerald-50 text-emerald-700 font-bold rounded-xl hover:bg-emerald-100 transition-colors">Reset Filter</a>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-16">
                {{ $tanamans->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
