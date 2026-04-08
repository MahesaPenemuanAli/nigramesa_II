<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Sidebar (1/4 Width) -->
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-6 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Pencarian</h3>
                        <form action="{{ route('katalog') }}" method="GET" class="mb-8">
                            @if(request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center bg-transparent pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </span>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="w-full pl-10 pr-4 py-2.5 border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 bg-gray-50 text-sm transition-all duration-300">
                            </div>
                        </form>

                        <h3 class="text-lg font-bold text-gray-800 mb-4">Kategori</h3>
                        <div class="space-y-1.5 flex flex-col">
                            <a href="{{ route('katalog', ['search' => request('search')]) }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ !request('kategori') ? 'bg-emerald-50 text-emerald-600' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-600' }}">
                                Semua Kategori
                            </a>
                            @foreach($kategoris as $kat)
                                <a href="{{ route('katalog', ['kategori' => $kat, 'search' => request('search')]) }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 {{ request('kategori') == $kat ? 'bg-emerald-50 text-emerald-600' : 'text-gray-600 hover:bg-gray-50 hover:text-emerald-600' }}">
                                    {{ $kat }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Grid Produk (3/4 Width) -->
                <div class="w-full lg:w-3/4">
                    @if($produks->isEmpty())
                        <!-- Pesan Kosong -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Produk tidak ditemukan</h3>
                            <p class="text-gray-500">Maaf, kami tidak dapat menemukan produk yang sesuai dengan pencarian Anda.</p>
                            <a href="{{ route('katalog') }}" class="inline-block mt-8 px-6 py-2.5 bg-emerald-50 text-emerald-600 font-bold rounded-xl hover:bg-emerald-100 transition-colors">Reset Semua Filter</a>
                        </div>
                    @else
                        <!-- Grid 3 Kolom -->
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                            @foreach($produks as $produk)
                                <div class="bg-white rounded-2xl shadow-sm border border-gray-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden group flex flex-col relative">
                                    <div class="relative aspect-video overflow-hidden bg-gray-100">
                                        <img src="{{ $produk->gambar ?: 'https://placehold.co/600x400/e2e8f0/475569?text=' . urlencode($produk->nama_produk) }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute top-3 left-3">
                                            <span class="px-3 py-1 bg-white/95 backdrop-blur-sm text-xs font-bold text-gray-800 rounded-lg shadow-sm border border-gray-100">
                                                {{ $produk->kategori }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-5 flex flex-col flex-1">
                                        <h3 class="text-lg font-bold text-gray-800 mb-1 leading-snug line-clamp-1 group-hover:text-emerald-600 transition-colors">{{ $produk->nama_produk }}</h3>
                                        <div class="text-2xl font-black text-emerald-600 mt-2 mb-5">
                                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="mt-auto">
                                            <a href="{{ route('katalog.show', $produk->id) }}" class="block w-full py-2.5 text-center bg-gray-50 hover:bg-emerald-600 border border-gray-100 text-gray-700 hover:text-white hover:border-emerald-600 font-bold rounded-xl transition-all duration-300">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        @if ($produks->hasPages())
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                                {{ $produks->links() }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
