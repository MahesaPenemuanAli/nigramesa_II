<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class SalesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Grafik Penjualan';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 2; // Spans 2 columns


    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Generate data for the last 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            $realData = Pesanan::whereDate('created_at', $date->toDateString())
                ->where('status_pesanan', '!=', 'dibatalkan')
                ->sum('total_harga');
            
            $data[] = $realData; 
            $labels[] = $date->format('j M');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Penjualan',
                    'data' => $data,
                    'borderColor' => '#115e39',
                    'backgroundColor' => 'rgba(17, 94, 57, 0.1)', // Light green fill
                    'fill' => true,
                    'tension' => 0.4, // Smooth curve
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
