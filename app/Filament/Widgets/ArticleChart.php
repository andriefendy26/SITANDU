<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\CategoryArticle;

class ArticleChart extends ChartWidget
{
    protected ?string $heading = 'Artikel Posts Chart';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = CategoryArticle::withCount('articles')
            ->orderByDesc('articles_count')
            ->get();

        return [
            'datasets' => [
                [
                    'label'           => 'Jumlah Artikel',
                    'data'            => $data->pluck('articles_count')->toArray(),
                    'backgroundColor' => [
                        '#1B3A6B', '#2756A4', '#C8922A', '#E8B84B',
                        '#3B82F6', '#10B981', '#F59E0B', '#EF4444',
                        '#8B5CF6', '#06B6D4',
                    ],
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
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
        ];
    }
}
