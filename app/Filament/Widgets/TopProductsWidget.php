<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use Filament\Widgets\Widget;

class TopProductsWidget extends Widget
{
    protected string $view = 'filament.widgets.top-products';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 1;

    protected function getViewData(): array
    {
        // Assuming lower stock means more sold for now, or just limit to 3.
        $products = \App\Models\DetailPesanan::selectRaw('produk_id, sum(jumlah) as total_terjual')
            ->groupBy('produk_id')
            ->orderBy('total_terjual', 'desc')
            ->take(3)
            ->with('produk')
            ->get();
        
        return [
            'products' => $products,
        ];
    }
}

