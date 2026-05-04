<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header Text -->
            <div class="mb-10 text-center lg:text-left px-4 sm:px-0">
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight mb-2">Perpustakaan Botani Terpadu</h1>
                <p class="text-gray-500 font-medium text-lg">Jelajahi dan unduh koleksi jurnal, pedoman bertani, hingga arsip riset langka.</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Sidebar (Kiri - Lebar 1/4) -->
                <div class="w-full lg:w-1/4 px-4 sm:px-0">
                    <form action="{{ route('perpustakaan') }}" method="GET" class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm sticky top-6">
                        
                        <!-- Search Box -->
                        <div class="mb-8">
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Telusuri Dokumen</h3>
                            <div class="relative flex items-center w-full h-12 rounded-xl bg-gray-50 border border-gray-200 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/30 transition-all overflow-hidden group">
                                <div class="pl-3 pr-2 text-gray-400 group-focus-within:text-emerald-500 transition-colors">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik kata kunci..." class="w-full h-full bg-transparent border-0 focus:ring-0 text-sm font-medium text-gray-700 outline-none pr-3">
                                <button type="submit" class="hidden"></button>
                            </div>
                        </div>

                        <!-- Kategori / Tipe (Vertical List) -->
                        <div>
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Filter Tipe Bacaan</h3>
                            <div class="flex flex-col gap-2">
                                <button type="submit" name="tipe" value="Semua" class="text-left px-5 py-3.5 rounded-xl text-sm font-bold transition-all flex items-center justify-between {{ !request('tipe') || request('tipe') == 'Semua' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 border border-transparent' }}">
                                    <span>Semua Bacaan</span>
                                    @if(!request('tipe') || request('tipe') == 'Semua')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    @endif
                                </button>
                                @foreach($tipes as $t)
                                    <button type="submit" name="tipe" value="{{ $t }}" class="text-left px-5 py-3.5 rounded-xl text-sm font-bold transition-all flex items-center justify-between {{ request('tipe') == $t ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 border border-transparent' }}">
                                        <span>{{ $t }}</span>
                                        @if(request('tipe') == $t)
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        @endif
                                    </button>
                                @endforeach
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Daftar Literatur (Kanan - Lebar 3/4 - Layout 1 Kolom) -->
                <div class="w-full lg:w-3/4 px-4 sm:px-0">
                    <div class="flex flex-col gap-6">
                        @forelse($literaturs as $literatur)
                            <!-- Kartu Horizontal Resolusi List View -->
                            <div class="bg-white rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col sm:flex-row group w-full">
                                
                                <!-- Kiri Kartu: Panel Cover -->
                                <div class="w-full sm:w-40 md:w-56 shrink-0 bg-gray-100 relative shadow-inner">
                                    <img src="{{ gambar_url($literatur->cover_gambar, 'https://placehold.co/300x450/f3f4f6/475569?text=' . urlencode($literatur->judul)) }}" alt="Cover" class="w-full h-56 sm:h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black/5 opacity-50"></div>
                                </div>

                                <!-- Kanan Kartu: Blok Informasi -->
                                <div class="p-6 md:p-8 flex flex-col flex-1 relative">
                                    <div class="flex flex-col sm:flex-row justify-between sm:items-start mb-4 gap-2">
                                        <!-- Badge Tipe -->
                                        <div class="px-3.5 py-1.5 bg-emerald-50 text-emerald-600 border border-emerald-100 text-xs font-black rounded-lg uppercase tracking-wider w-max">
                                            {{ $literatur->tipe }}
                                        </div>
                                        <!-- Tanggal Terbit -->
                                        <div class="text-xs font-bold text-gray-400 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-50 whitespace-nowrap">
                                            {{ $literatur->tanggal_terbit ? \Carbon\Carbon::parse($literatur->tanggal_terbit)->translatedFormat('d M Y') : 'Tanpa Tanggal' }}
                                        </div>
                                    </div>
                                    
                                    <!-- Judul Tebal & Besar -->
                                    <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-3 leading-tight group-hover:text-emerald-700 transition-colors line-clamp-2 md:pr-4">
                                        {{ $literatur->judul }}
                                    </h3>
                                    
                                    <!-- Penulis Abu-abu -->
                                    <p class="text-sm font-bold text-gray-500 mb-6 flex items-center gap-2">
                                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        {{ $literatur->penulis }}
                                    </p>

                                    <!-- Tombol Kanan Bawah Terfokus -->
                                    <div class="mt-auto flex justify-end">
                                        <a href="{{ route('perpustakaan.show', $literatur->id) }}" class="inline-flex items-center gap-2 px-8 py-3 bg-white hover:bg-emerald-600 text-emerald-600 hover:text-white border-2 border-emerald-100 hover:border-emerald-600 font-bold rounded-xl transition-all w-full sm:w-auto justify-center group/btn shadow-sm">
                                            <span>Lihat Detail Arsip</span>
                                            <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <!-- State Kosong -->
                            <div class="bg-white p-12 lg:p-20 rounded-[2.5rem] border border-gray-100 text-center shadow-sm w-full h-full flex flex-col justify-center items-center">
                                <div class="w-24 h-24 bg-gray-50 rounded-full flex justify-center items-center mb-6">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-black text-gray-800 mb-3">Arsip Tidak Ditemukan</h3>
                                <p class="text-gray-500 mb-8 max-w-sm font-medium">Buku dengan kriteria nama maupun filter tipe yang Anda tulis tidak dipunyai koleksi saat ini.</p>
                                <a href="{{ route('perpustakaan') }}" class="px-8 py-3.5 bg-emerald-50 text-emerald-700 font-bold rounded-xl hover:bg-emerald-100 shadow-sm transition-colors">Reset Parameter</a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Paginasi Minimalis -->
                    <div class="mt-12">
                        {{ $literaturs->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
