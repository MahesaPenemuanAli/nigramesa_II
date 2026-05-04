<x-app-layout>
    <div class="bg-slate-50 min-h-screen py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumbs -->
            <nav class="flex mb-10 text-sm font-semibold text-gray-400 items-center">
                <a href="{{ route('perpustakaan') }}" class="hover:text-emerald-600 transition-colors bg-white px-4 py-2 border border-gray-200 rounded-full shadow-sm">Perpustakaan Digital</a>
                <span class="mx-3 text-gray-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
                <span class="text-emerald-700 bg-emerald-50 px-4 py-2 rounded-full border border-emerald-100 line-clamp-1 max-w-[200px] md:max-w-none">{{ $literatur->judul }}</span>
            </nav>

            <div class="bg-white rounded-[3rem] shadow-[0_2px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-8 md:p-14 mb-12">
                <div class="flex flex-col md:flex-row gap-12 lg:gap-16 items-start">
                    
                    <!-- Kiri: Cover -->
                    <div class="w-full md:w-1/3 flex flex-col items-center shrink-0">
                        <div class="w-full aspect-[3/4] bg-gray-100 rounded-3xl overflow-hidden shadow-2xl mb-10 relative border border-gray-200 group">
                            <img src="{{ gambar_url($literatur->cover_gambar, 'https://placehold.co/400x600/f3f4f6/475569?font=montserrat&text=' . urlencode($literatur->judul)) }}" alt="Cover Buku" class="w-full h-full object-cover">
                            <div class="absolute inset-0 ring-1 ring-inset ring-black/10 rounded-3xl z-10 pointer-events-none"></div>
                            
                            <!-- Hover glass effect -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <a href="{{ $literatur->file_url ? gambar_url($literatur->file_url) : '#' }}" target="_blank" class="w-full py-4 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-black text-lg text-center rounded-2xl shadow-lg shadow-emerald-600/20 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-3 active:scale-95 group">
                            <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Buka / Unduh Dokumen
                        </a>
                    </div>

                    <!-- Kanan: Meta -->
                    <div class="w-full md:w-2/3 flex flex-col justify-center h-full">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 text-emerald-700 text-sm font-black rounded-xl uppercase tracking-wider mb-8 w-max border border-emerald-100 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            {{ $literatur->tipe }}
                        </div>
                        
                        <h1 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 leading-tight tracking-tight">{{ $literatur->judul }}</h1>
                        
                        <div class="text-xl text-gray-500 font-medium mb-12 flex items-center gap-3">
                            <span class="inline-flex items-center gap-2 bg-gray-50 px-4 py-2 rounded-xl text-gray-600 border border-gray-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                Penulis: <span class="text-gray-900 font-bold ml-1">{{ $literatur->penulis }}</span>
                            </span>
                        </div>

                        <hr class="border-gray-100 mb-12">

                        <!-- Metadata Table -->
                        <h4 class="text-lg font-black text-gray-800 mb-4">Informasi Tambahan</h4>
                        <div class="bg-gray-50 rounded-[2rem] p-6 md:p-8 border border-gray-100 w-full relative overflow-hidden shadow-inner">
                            <table class="w-full relative z-10 text-left border-collapse">
                                <tbody>
                                    <tr class="border-b border-gray-200/60">
                                        <td class="py-5 text-sm font-bold text-gray-400 uppercase tracking-wide w-2/5 md:w-1/3">Tanggal Terbit</td>
                                        <td class="py-5 text-base font-bold text-gray-900">{{ $literatur->tanggal_terbit ? \Carbon\Carbon::parse($literatur->tanggal_terbit)->translatedFormat('d F Y') : 'Tidak Diketahui' }}</td>
                                    </tr>
                                    <tr class="border-b border-gray-200/60">
                                        <td class="py-5 text-sm font-bold text-gray-400 uppercase tracking-wide">Format Arsip</td>
                                        <td class="py-5 text-base font-bold text-gray-900 flex items-center gap-2">
                                            <span class="bg-red-50 text-red-600 px-2.5 py-1 rounded-md text-xs font-black tracking-widest border border-red-100">PDF</span>
                                            Electronic Document
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-5 text-sm font-bold text-gray-400 uppercase tracking-wide">Hak Akses Sistem</td>
                                        <td class="py-5 text-sm font-bold text-emerald-600 flex items-center gap-2">
                                            <span class="bg-emerald-100 p-1 rounded-full text-emerald-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </span>
                                            Tersedia untuk Member Nigramesa
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
