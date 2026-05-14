<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Transaksi & Aktivitas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl p-8">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900">Riwayat Transaksi & Aktivitas</h3>
                    <p class="text-sm text-gray-500 mt-2">Pantau status pesanan dan aktivitas edukasi Anda di sini.</p>
                </div>

                <div class="space-y-6">
                    @forelse($pesanans as $pesanan)
                        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 p-6 flex flex-col md:flex-row gap-6">
                            @php
                                $firstDetail = $pesanan->detailPesanans->first();
                                $produk = $firstDetail ? $firstDetail->produk : null;
                            @endphp
                            
                            <div class="shrink-0">
                                @if($produk && $produk->gambar)
                                    <img src="{{ str_starts_with($produk->gambar, 'http') ? $produk->gambar : asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-24 h-24 object-cover rounded-xl shadow-sm border border-gray-100">
                                @else
                                    <div class="w-24 h-24 bg-gray-100 rounded-xl flex items-center justify-center border border-gray-200">
                                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-grow flex flex-col justify-center">
                                <div class="flex flex-wrap items-center justify-between mb-2 gap-2">
                                    <span class="text-xs font-bold px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full border border-emerald-100">
                                        INV-{{ $pesanan->created_at->format('Y') }}-{{ str_pad($pesanan->id, 5, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <span class="text-xs text-gray-500 font-medium">
                                        {{ $pesanan->created_at->format('d M Y, H:i') }}
                                    </span>
                                </div>

                                <h4 class="text-lg font-bold text-gray-900 mb-1">
                                    @if($produk)
                                        {{ $produk->nama_produk }}
                                        @if($pesanan->detailPesanans->count() > 1)
                                            <span class="text-sm font-normal text-gray-500 ml-1">dan {{ $pesanan->detailPesanans->count() - 1 }} produk lainnya</span>
                                        @endif
                                    @else
                                        Pesanan #{{ $pesanan->id }}
                                    @endif
                                </h4>

                                <div class="flex flex-wrap items-end justify-between mt-auto gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Total Belanja</p>
                                        <p class="text-emerald-600 font-bold text-lg">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                                    </div>

                                    <div>
                                        @php
                                            $status = strtolower($pesanan->status_pesanan);
                                            $statusColors = [
                                                'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                'menunggu' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                'proses' => 'bg-blue-100 text-blue-800 border-blue-200',
                                                'dikirim' => 'bg-indigo-100 text-indigo-800 border-indigo-200',
                                                'selesai' => 'bg-green-100 text-green-800 border-green-200',
                                                'batal' => 'bg-red-100 text-red-800 border-red-200',
                                                'dibatalkan' => 'bg-red-100 text-red-800 border-red-200',
                                            ];
                                            $colorClass = $statusColors[$status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                                        @endphp
                                        <span class="px-4 py-1.5 rounded-full text-sm font-semibold border {{ $colorClass }} uppercase tracking-wider">
                                            {{ ucfirst($pesanan->status_pesanan) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16 bg-white border border-gray-100 rounded-3xl shadow-sm">
                            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-emerald-50 mb-6">
                                <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada riwayat pesanan</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">Anda belum melakukan transaksi apapun. Ayo mulai belanja kebutuhan pertanian dan perawatan tanaman Anda.</p>
                            <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full font-semibold transition-colors duration-200 shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Mulai Belanja
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
