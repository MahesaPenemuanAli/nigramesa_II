<x-filament-widgets::widget>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Total Pesanan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between h-full">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg" style="background-color: #e6f6ec; color: #115e39;">
                    OP
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-500">Total Pesanan</span>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-extrabold text-gray-900 leading-none">{{ number_format($totalPesanan, 0, ',', '.') }}</span>
                    </div>
                    <span class="text-xs font-bold mt-1" style="color: #115e39;">+12% bulan ini</span>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between h-full">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg" style="background-color: #e6f6ec; color: #115e39;">
                    PL
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-500">Total Pelanggan</span>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-extrabold text-gray-900 leading-none">{{ number_format($totalPelanggan, 0, ',', '.') }}</span>
                    </div>
                    <span class="text-xs font-bold mt-1" style="color: #115e39;">284 pelanggan baru</span>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between h-full">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg" style="background-color: #e6f6ec; color: #115e39;">
                    RP
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-500">Total Pendapatan</span>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-extrabold text-gray-900 leading-none">{{ $totalPendapatan }}</span>
                    </div>
                    <span class="text-xs font-bold mt-1" style="color: #115e39;">Margin stabil</span>
                </div>
            </div>
        </div>

        <!-- Total Produk -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between h-full">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg" style="background-color: #e6f6ec; color: #115e39;">
                    PR
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-500">Total Produk</span>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-extrabold text-gray-900 leading-none">{{ number_format($totalProduk, 0, ',', '.') }}</span>
                    </div>
                    <span class="text-xs font-bold mt-1" style="color: #115e39;">{{ $stokMenipis }} stok menipis</span>
                </div>
            </div>
        </div>

    </div>
</x-filament-widgets::widget>
