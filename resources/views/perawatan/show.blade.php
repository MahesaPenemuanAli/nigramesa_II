<x-app-layout>
    <div class="bg-gray-50 min-h-screen pb-20">
        <!-- Banner Image Full Width -->
        <div class="w-full h-[40vh] md:h-[60vh] relative group overflow-hidden">
            <img src="{{ gambar_url($tanaman->gambar, 'https://placehold.co/1920x800/10b981/ffffff?text=' . urlencode($tanaman->nama_tanaman)) }}" alt="{{ $tanaman->nama_tanaman }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-1000 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            
            <!-- Breadcrumb & Title inside Banner -->
            <div class="absolute bottom-0 left-0 w-full p-6 md:p-16">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center text-sm font-bold text-emerald-200 mb-6 tracking-wide gap-3">
                        <a href="{{ route('perawatan') }}" class="hover:text-white transition-colors bg-black/20 px-3 py-1 rounded-lg backdrop-blur-sm">Ensiklopedia</a>
                        <span>•</span>
                        <span class="text-emerald-400 bg-black/20 px-3 py-1 rounded-lg backdrop-blur-sm shadow-sm">{{ $tanaman->kategori }}</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white drop-shadow-lg tracking-tight mb-2">{{ $tanaman->nama_tanaman }}</h1>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 flex flex-col lg:flex-row gap-12">
            
            <!-- Konten Kiri (2/3) -->
            <div class="w-full lg:w-2/3">
                <div class="bg-white p-8 md:p-14 rounded-[2.5rem] shadow-[0_2px_20px_rgba(0,0,0,0.03)] border border-gray-100">
                    
                    <h2 class="text-2xl md:text-3xl font-black text-gray-800 mb-6 flex items-center gap-4">
                        <span class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shadow-inner">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </span>
                        Pengenalan Singkat
                    </h2>
                    
                    <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-12 font-medium">
                        {{ $tanaman->deskripsi_singkat }}
                    </p>

                    <hr class="border-gray-100 mb-12">

                    <h2 class="text-2xl md:text-3xl font-black text-gray-800 mb-8 flex items-center gap-4">
                        <span class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shadow-inner">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </span>
                        Prosedur Perawatan Tepat
                    </h2>
                    
                    <!-- Format the LongText Guide Output to be beautifully spaced -->
                    <div class="prose prose-lg md:prose-xl prose-emerald max-w-none text-gray-600 leading-loose prose-p:mb-6 prose-headings:font-bold">
                        {!! nl2br(e($tanaman->cara_perawatan)) !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar Kanan (1/3) -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 sticky top-10">
                    <h3 class="text-xl font-black text-gray-800 mb-8 border-b border-gray-100 pb-5 uppercase tracking-wide">Kondisi Ideal Tumbuh</h3>
                    
                    <div class="space-y-6">
                        <!-- Air Card -->
                        <div class="bg-blue-50 p-6 rounded-3xl relative overflow-hidden group border border-blue-100/50">
                            <div class="absolute -right-8 -bottom-8 text-blue-100 opacity-40 group-hover:scale-125 transition-transform duration-500">
                                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm text-blue-500 flex items-center justify-center mb-5 border border-blue-100">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                </div>
                                <h4 class="font-black text-blue-900 mb-2 text-lg">Indikator Air</h4>
                                <p class="text-blue-800 font-medium text-sm leading-relaxed">{{ $tanaman->kebutuhan_air }}</p>
                            </div>
                        </div>

                        <!-- Cahaya Card -->
                        <div class="bg-amber-50 p-6 rounded-3xl relative overflow-hidden group border border-amber-100/50">
                            <div class="absolute -right-8 -top-8 text-amber-100 opacity-40 group-hover:rotate-45 transition-transform duration-700">
                                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm text-amber-500 flex items-center justify-center mb-5 border border-amber-100">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <h4 class="font-black text-amber-900 mb-2 text-lg">Indikator Paparan Cahaya</h4>
                                <p class="text-amber-800 font-medium text-sm leading-relaxed">{{ $tanaman->kebutuhan_cahaya }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
