<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use Filament\Widgets\ChartWidget;

class StatusChartWidget extends ChartWidget
{
    protected ?string $heading = 'Status Pesanan';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $pesananStatus = Pesanan::selectRaw('status_pesanan, count(*) as count')
                            ->groupBy('status_pesanan')
                            ->pluck('count', 'status_pesanan')
                            ->toArray();

        $dikirim = $pesananStatus['dikirim'] ?? 0;
        $diproses = $pesananStatus['diproses'] ?? 0;
        $menunggu = $pesananStatus['pending'] ?? 0;
        $dibatalkan = $pesananStatus['dibatalkan'] ?? 0;

        return [
            'datasets' => [
                [
                    'label' => 'Status',
                    'data' => [$dikirim, $diproses, $menunggu, $dibatalkan],
                    'backgroundColor' => ['#0F5132', '#198754', '#F59E0B', '#DC2626'],
                    'borderWidth' => 0,
                ],
            ],
            'labels' => ['Dikirim', 'Diproses', 'Menunggu', 'Dibatalkan'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
    
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
            'cutout' => '68%',
        ];
    }
}
