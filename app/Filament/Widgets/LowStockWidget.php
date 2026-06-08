<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use Filament\Widgets\Widget;

class LowStockWidget extends Widget
{
    protected string $view = 'filament.widgets.low-stock';
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 1;

    protected function getViewData(): array
    {
        $products = Produk::query()->where('stok', '<', 10)->orderBy('stok', 'asc')->take(5)->get();
        
        return [
            'products' => $products,
        ];
    }
}
