<x-filament-widgets::widget>
    <x-filament::section class="h-full">
        <h2 class="text-lg font-bold text-gray-900 mb-6">Peringatan Stok Menipis</h2>
        
        <div class="flex flex-col gap-6">
            @forelse ($products as $product)
                <div class="flex items-center justify-between gap-4">
                    <div class="flex-1 flex flex-col justify-center">
                        <h3 class="text-sm font-semibold text-gray-800">{{ $product->nama_produk }}</h3>
                    </div>
                    
                    <div class="px-2.5 py-1 text-xs font-bold rounded-md" style="background-color: #fef3c7; color: #b45309;">
                        Stok {{ $product->stok }}
                    </div>
                </div>
            @empty
                <div class="text-sm text-gray-500">Semua stok aman.</div>
            @endforelse
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
