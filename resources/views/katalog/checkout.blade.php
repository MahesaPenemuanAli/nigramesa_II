<x-app-layout>
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Checkout Pesanan</h1>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Kiri: Form -->
                    <div class="w-full lg:w-2/3 space-y-6">
                        
                        <!-- Alert Error jika ada -->
                        @if(session('error'))
                            <div class="p-4 bg-red-50 text-red-600 rounded-xl font-medium border border-red-200 flex flex-row items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Section: Data Pengiriman -->
                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
                            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                                <span class="bg-emerald-100 p-2 rounded-xl text-emerald-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </span>
                                Detail Pengiriman
                            </h2>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap Tujuan</label>
                                <textarea name="alamat_pengiriman" rows="4" class="w-full rounded-2xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 shadow-sm text-sm" placeholder="Tuliskan jalan, nomor rumah, RT/RW, dan patokan agar kurir mudah menemukan alamat Anda..." required>{{ old('alamat_pengiriman', auth()->user()->alamat_lengkap) }}</textarea>
                                @error('alamat_pengiriman')
                                    <span class="text-sm text-red-500 mt-1 block font-medium">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section: Pembayaran -->
                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
                            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                                <span class="bg-emerald-100 p-2 rounded-xl text-emerald-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </span>
                                Metode Pembayaran
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="metode_pembayaran" value="Transfer Bank" class="peer sr-only" required>
                                    <div class="p-5 border-2 border-gray-100 rounded-2xl peer-checked:border-emerald-500 peer-checked:bg-emerald-50 hover:bg-gray-50 transition-all">
                                        <div class="font-bold text-gray-800 flex justify-between items-center">
                                            Transfer Bank
                                            <svg class="w-5 h-5 text-emerald-500 opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-2">BCA, BNI, Mandiri, BRI</div>
                                    </div>
                                    <div class="absolute top-5 right-5 pointer-events-none opacity-0 peer-checked:opacity-100 text-emerald-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                </label>
                                
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="metode_pembayaran" value="E-Wallet" class="peer sr-only" required>
                                    <div class="p-5 border-2 border-gray-100 rounded-2xl peer-checked:border-emerald-500 peer-checked:bg-emerald-50 hover:bg-gray-50 transition-all">
                                        <div class="font-bold text-gray-800">Dompet Digital</div>
                                        <div class="text-xs text-gray-500 mt-2">Gopay, OVO, Dana, ShopeePay</div>
                                    </div>
                                    <div class="absolute top-5 right-5 pointer-events-none opacity-0 peer-checked:opacity-100 text-emerald-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                </label>
                                
                                <label class="cursor-pointer relative md:col-span-2">
                                    <input type="radio" name="metode_pembayaran" value="COD" class="peer sr-only" required>
                                    <div class="p-5 border-2 border-gray-100 rounded-2xl peer-checked:border-emerald-500 peer-checked:bg-emerald-50 hover:bg-gray-50 transition-all flex justify-between items-center">
                                        <div>
                                            <div class="font-bold text-gray-800">Bayar di Tempat (COD)</div>
                                            <div class="text-xs text-gray-500 mt-2">Bayar langsung dengan tunai saat barang pesanan tiba di rumah</div>
                                        </div>
                                    </div>
                                    <div class="absolute top-1/2 -translate-y-1/2 right-5 pointer-events-none opacity-0 peer-checked:opacity-100 text-emerald-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                </label>
                            </div>
                            @error('metode_pembayaran')
                                <span class="text-sm text-red-500 mt-2 block font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Kanan: Ringkasan -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 sticky top-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">Ringkasan Pesanan</h2>
                            
                            <div class="flex items-center gap-4 border-b border-dashed border-gray-200 pb-6 mb-6">
                                <div class="w-20 h-20 rounded-2xl bg-gray-100 overflow-hidden flex-shrink-0 border border-gray-50">
                                    <img src="{{ $item['gambar'] ?: 'https://placehold.co/600x400/e2e8f0/475569?text=' . urlencode($item['nama_produk']) }}" class="w-full h-full object-cover" alt="Produk">
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 text-sm leading-snug">{{ $item['nama_produk'] }}</h4>
                                    <div class="text-sm font-semibold text-gray-500 mt-2 bg-gray-50 px-2 py-1 rounded inline-block">Jumlah: {{ $item['quantity'] }}</div>
                                </div>
                            </div>

                            <div class="space-y-4 text-sm font-medium text-gray-600 border-b border-dashed border-gray-200 pb-6 mb-6">
                                <div class="flex justify-between items-center">
                                    <span>Subtotal</span>
                                    <span class="text-gray-900 font-bold">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Pajak Transaksi (11%)</span>
                                    <span class="text-gray-900 font-bold">Rp {{ number_format($pajak, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center text-emerald-600 bg-emerald-50 p-2 rounded-lg -mx-2 px-2">
                                    <span>Biaya Pengiriman</span>
                                    <span class="font-bold">Gratis Ongkir</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-end mb-8">
                                <span class="text-gray-800 font-bold">Total Akhir</span>
                                <span class="text-3xl font-black text-emerald-600 tracking-tight">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
                            </div>

                            <button type="submit" class="w-full h-14 bg-emerald-600 hover:bg-emerald-700 text-white text-lg font-black rounded-xl shadow-lg shadow-emerald-200 transition-all duration-300 flex items-center justify-center gap-2 group">
                                Proses Pesanan
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                            <p class="text-xs text-center text-gray-400 mt-4">Dengan membuat pesanan, Anda menyetujui Ketentuan Layanan kami.</p>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
