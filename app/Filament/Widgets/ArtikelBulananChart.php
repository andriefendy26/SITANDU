<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ArtikelBulananChart extends ChartWidget
{
    protected ?string $heading = 'Artikel Diterbitkan per Bulan (12 Bulan Terakhir)';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data   = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $month    = Carbon::now()->subMonths($i);
            $labels[] = $month->translatedFormat('M Y');
            $data[]   = Article::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label'           => 'Artikel Diterbitkan',
                    'data'            => $data,
                    'borderColor'     => '#1B3A6B',
                    'backgroundColor' => 'rgba(27, 58, 107, 0.1)',
                    'fill'            => true,
                    'tension'         => 0.4,
                    'pointBackgroundColor' => '#C8922A',
                    'pointRadius'     => 5,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks'       => ['stepSize' => 1],
                ],
            ],
        ];
    }
}

