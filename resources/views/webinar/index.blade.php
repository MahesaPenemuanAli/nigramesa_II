<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Halaman -->
            <div class="mb-14 text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 tracking-tight mb-5 drop-shadow-sm">Webinar Botani interaktif</h1>
                <p class="text-gray-500 font-medium text-lg md:text-xl max-w-2xl mx-auto">Ikuti kelas interaktif langsung bersama para pahlawan botani dan pakar agrikultur modern.</p>
                
                @if(session('success'))
                    <div class="mt-8 mx-auto w-max flex items-center gap-3 bg-emerald-50 text-emerald-700 px-6 py-3 rounded-full border border-emerald-200 font-bold shadow-sm">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mt-8 mx-auto w-max flex items-center gap-3 bg-red-50 text-red-700 px-6 py-3 rounded-full border border-red-200 font-bold shadow-sm">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <!-- Section 1: Live Now -->
            <div class="mb-20">
                <div class="flex items-center gap-4 mb-8 bg-white px-6 py-4 rounded-2xl shadow-sm border border-gray-100 max-w-max">
                    <div class="relative flex h-5 w-5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-5 w-5 bg-red-500 border border-white"></span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-widest">Sedang Berlangsung</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                    @forelse($liveWebinars as $webinar)
                        <div class="bg-white rounded-[2.5rem] shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group relative">
                            <!-- Hero Banner Thumbnail -->
                            <div class="relative w-full aspect-video bg-gray-900 overflow-hidden shadow-inner">
                                <img src="{{ gambar_url($webinar->cover_gambar, 'https://placehold.co/800x450/111827/ffffff?font=montserrat&text=' . urlencode($webinar->judul)) }}" alt="Cover Webinar" class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-1000 ease-out">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
                                <div class="absolute top-5 left-5 bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-black uppercase tracking-widest shadow-xl flex items-center gap-2 border-[1.5px] border-red-400/50 backdrop-blur-sm">
                                    <div class="w-2.5 h-2.5 bg-white rounded-full animate-pulse shadow-glow"></div>
                                    TAYANG LANGSUNG
                                </div>
                            </div>
                            
                            <div class="p-8 flex flex-col flex-1 relative z-10 bg-white shadow-[-10px_-20px_20px_rgba(255,255,255,1)] rounded-t-[2.5rem] -mt-10">
                                <h3 class="text-2xl font-black text-gray-900 mb-4 leading-tight line-clamp-2 md:line-clamp-3 group-hover:text-emerald-700 transition-colors">{{ $webinar->judul }}</h3>
                                <p class="text-sm font-bold text-gray-500 mb-8 flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </span>
                                    {{ $webinar->pembicara }}
                                </p>
                                
                                <!-- Container Bawah -->
                                <div class="mt-auto pt-4 border-t border-gray-100">
                                    @if(in_array($webinar->id, $registeredWebinarIds))
                                        <a href="{{ route('webinar.show', $webinar->id) }}" class="flex items-center justify-center gap-2 w-full py-4 bg-red-600 hover:bg-red-700 text-white font-black rounded-2xl shadow-lg shadow-red-600/30 transition-all uppercase tracking-wider text-sm hover:-translate-y-1 overflow-hidden relative group/btn">
                                            Tonton Sekarang
                                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </a>
                                    @else
                                        <form action="{{ route('webinar.daftar', $webinar->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="flex items-center justify-center gap-2 w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-2xl shadow-lg shadow-emerald-600/30 transition-all uppercase tracking-wider text-sm hover:-translate-y-1">
                                                Daftar Bebas Akses
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Kosong State -->
                        <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-14 rounded-[3rem] border border-gray-100 text-center shadow-sm flex flex-col items-center">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-2">Belum Tersedia Sesi Live</h3>
                            <p class="text-gray-500 font-medium">Cek secara berkala untuk jangan sampai lewatkan siaran panel diskusi pakar bulan ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <hr class="border-gray-200 border-dashed mb-16">

            <!-- Section 2: Upcoming -->
            <div>
                <div class="flex items-center gap-4 mb-8 bg-white px-6 py-4 rounded-2xl shadow-sm border border-gray-100 max-w-max">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-widest">Jadwal Mendatang</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                    @forelse($upcomingWebinars as $webinar)
                        <div class="bg-white rounded-[2.5rem] shadow-sm hover:shadow-[0_12px_40px_rgba(0,0,0,0.06)] transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group border-b-4 border-b-emerald-500/0 hover:border-b-emerald-500">
                            <!-- Banner -->
                            <div class="relative w-full aspect-[5/3] bg-gray-100 overflow-hidden shadow-inner">
                                <img src="{{ gambar_url($webinar->cover_gambar, 'https://placehold.co/800x480/f3f4f6/475569?font=montserrat&text=' . urlencode($webinar->judul)) }}" alt="Cover Jadwal" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-colors"></div>
                                <!-- Tanggal Overlay -->
                                <div class="absolute top-4 left-4 flex items-center gap-2 text-[11px] font-black text-emerald-700 bg-white/95 backdrop-blur shadow-sm px-3.5 py-2 rounded-xl uppercase tracking-widest border border-white">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ \Carbon\Carbon::parse($webinar->waktu_mulai)->translatedFormat('d M Y, H:i') }}
                                </div>
                            </div>
                            
                            <div class="p-8 flex flex-col flex-1">
                                <h3 class="text-xl font-black text-gray-900 mb-3 leading-snug line-clamp-2 md:line-clamp-3 group-hover:text-emerald-700 transition-colors">{{ $webinar->judul }}</h3>
                                
                                <p class="text-sm font-bold text-gray-500 mb-8 flex items-center gap-3">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Oleh: {{ $webinar->pembicara }}
                                </p>
                                
                                <div class="mt-auto border-t border-gray-100 pt-5">
                                    @if(in_array($webinar->id, $registeredWebinarIds))
                                        <button disabled class="w-full py-3.5 bg-gray-50 text-gray-400 font-black rounded-xl border border-gray-200 uppercase tracking-widest text-sm flex items-center justify-center gap-2 cursor-not-allowed">
                                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Tiket Diamankan
                                        </button>
                                    @else
                                        <form action="{{ route('webinar.daftar', $webinar->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full py-3.5 bg-white text-emerald-600 border-[2px] border-emerald-100 hover:border-emerald-600 hover:bg-emerald-600 hover:text-white font-black rounded-xl transition-all uppercase tracking-widest text-sm shadow-sm flex items-center justify-center gap-2">
                                                <span>Reservasi Duduk</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-16 rounded-[3rem] border border-gray-100 text-center shadow-sm flex flex-col items-center">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Kalender Kosong</h3>
                            <p class="text-gray-500">Staf kurasi kami sedang menyiapkan pemateri untuk jadwal webinar bulan depan.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
