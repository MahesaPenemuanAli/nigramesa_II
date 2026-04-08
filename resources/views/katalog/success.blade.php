<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-20 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-emerald-50 via-gray-50 to-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <div class="bg-white rounded-[2.5rem] p-8 md:p-14 shadow-sm border border-emerald-50 flex flex-col items-center relative overflow-hidden">
                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-50 rounded-full blur-3xl -mr-32 -mt-32 opacity-50 z-0"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-50 rounded-full blur-3xl -ml-32 -mb-32 opacity-50 z-0"></div>

                <div class="w-28 h-28 bg-emerald-100 rounded-full flex items-center justify-center mb-8 relative z-10 shadow-inner">
                    <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-30"></div>
                    <svg class="w-14 h-14 text-emerald-600 relative z-10 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 z-10 tracking-tight">Pesanan Berhasil!</h1>
                <p class="text-lg text-gray-500 mb-10 w-full md:w-4/5 leading-relaxed z-10">
                    Hore! Pesanan Anda telah resmi tercatat di sistem kami. Kami akan segera mempersiapkannya agar tiba dengan selamat ke tujuan Anda.
                </p>

                <!-- Order Slip -->
                <div class="w-full bg-white rounded-3xl p-6 md:p-10 mb-10 text-left border border-gray-100 shadow-[0_2px_20px_rgba(0,0,0,0.03)] z-10 relative">
                    <div class="absolute -top-3 right-8 text-emerald-50">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H8l4-7v4h3l-4 7z"></path></svg>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 relative z-10">
                        <div>
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nomor Transaksi</div>
                            <div class="text-xl font-black text-gray-800 font-mono">#ORD-{{ str_pad($pesanan->id, 8, '0', STR_PAD_LEFT) }}</div>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Tagihan</div>
                            <div class="text-xl font-black text-emerald-600">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</div>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Jalur Pembayaran</div>
                            <div class="text-lg font-bold text-gray-800">{{ $pesanan->metode_pembayaran }}</div>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Status Operasi</div>
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-50 text-amber-600 text-sm font-bold rounded-xl uppercase tracking-wide border border-amber-100">
                                <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $pesanan->status_pesanan }}
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instruction block -->
                    <div class="mt-8 pt-8 border-t border-dashed border-gray-200 relative z-10">
                        <div class="flex items-center gap-2 text-sm font-bold text-gray-500 mb-3 uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tindak Lanjut Pembayaran
                        </div>
                        
                        <div class="bg-blue-50/50 p-5 rounded-2xl border border-blue-50">
                            @if($pesanan->metode_pembayaran == 'Transfer Bank')
                                <p class="text-slate-700 font-medium leading-relaxed">
                                    Silakan lakukan transfer uang spesifik sebesar <span class="font-bold text-emerald-600">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span> ke rekening resmi kami: 
                                    <br><span class="inline-block mt-2 font-mono text-lg font-black bg-white px-4 py-2 rounded-lg border border-blue-100">BCA 1234 5678 90</span> a.n Nigramesa. 
                                    <br>Sistem kami akan memverifikasi otomatis dalam estimasi 1x24 jam setelah transfer berhasil.
                                </p>
                            @elseif($pesanan->metode_pembayaran == 'COD')
                                <p class="text-slate-700 font-medium leading-relaxed">
                                    Pastikan Anda menyiapkan bujet uang pas senilai <span class="font-bold text-emerald-600 text-lg">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span> secara tunai. Berikan dana ini kepada mitra kurir kurir setibanya barang di alamat Anda.
                                </p>
                            @else
                                <p class="text-slate-700 font-medium leading-relaxed">
                                    Tautan e-payment telah diledakkan ke aplikasi provider dompet digital Anda. Silakan verifikasi *PIN* Anda di aplikasi E-Wallet terkait dan selesaikan transaksi nominal <span class="font-bold text-emerald-600 text-lg">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Call to Actions -->
                <div class="flex flex-col sm:flex-row gap-5 w-full justify-center z-10 relative">
                    <a href="{{ route('katalog') }}" class="px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white text-lg font-black rounded-2xl shadow-[0_8px_30px_rgb(16,185,129,0.3)] hover:shadow-[0_8px_30px_rgb(16,185,129,0.5)] hover:-translate-y-1 transition-all duration-300">Belanja Katalog Lagi</a>
                    <a href="#" class="px-8 py-4 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 text-lg font-bold rounded-2xl shadow-sm transition-all duration-300">Lihat Riwayat User</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
