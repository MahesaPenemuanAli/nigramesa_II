<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Filament\Widgets\Widget;

class StatsOverviewWidget extends Widget
{
    protected string $view = 'filament.widgets.custom-stats-overview';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';


    protected function getViewData(): array
    {
        $totalPesanan = Pesanan::count();
        $totalPelanggan = User::where('email', '!=', 'admin@nigramesa.botany.id')->count();
        $totalPendapatan = Pesanan::sum('total_harga') ?? 0;
        $totalProduk = Produk::count();
        
        $stokMenipis = Produk::where('stok', '<', 10)->count();

        // Format Pendapatan to "jt" (juta) if it's large enough, else format normally.
        $formattedPendapatan = 'Rp' . number_format($totalPendapatan, 0, ',', '.');
        if ($totalPendapatan >= 1000000) {
            $formattedPendapatan = 'Rp' . number_format($totalPendapatan / 1000000, 1, ',', '.') . ' jt';
        }

        return [
            'totalPesanan' => $totalPesanan,
            'totalPelanggan' => $totalPelanggan,
            'totalPendapatan' => $formattedPendapatan,
            'totalProduk' => $totalProduk,
            'stokMenipis' => $stokMenipis,
        ];
    }
}

