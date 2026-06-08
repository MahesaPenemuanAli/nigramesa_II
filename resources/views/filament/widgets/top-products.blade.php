<x-filament-widgets::widget>
    <x-filament::section class="h-full">
        <h2 class="text-lg font-bold text-gray-900 mb-6">Produk Terlaris</h2>
        
        <div class="flex flex-col gap-5">
            @foreach ($products as $product)
                @php
                    $terjual = rand(500, 1500); // Simulate sold amount for display
                @endphp
                <div class="flex items-center gap-4">
                    <!-- Image placeholder similar to mockup -->
                    <div class="w-12 h-12 rounded-xl bg-[#e6f6ec] flex-shrink-0 relative overflow-hidden flex items-center justify-center">
                        @if ($product->produk->gambar ?? null)
                            <img src="{{ Storage::url($product->produk->gambar) }}" alt="{{ $product->produk->nama_produk ?? 'Produk Terhapus' }}" class="object-cover w-full h-full opacity-50 mix-blend-multiply">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#e6f6ec] to-[#cbf0d8]"></div>
                        @endif
                    </div>
                    
                    <div class="flex-1 flex flex-col justify-center">
                        <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $product->produk->nama_produk ?? 'Produk Terhapus' }}</h3>
                        <p class="text-xs text-gray-500 font-medium mt-0.5">Terjual {{ number_format($product->total_terjual, 0, ',', '.') }}</p>
                    </div>
                    
                    <div class="text-sm font-bold text-gray-900">
                        Rp {{ number_format($product->produk->harga ?? 0, 0, ',', '.') }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
