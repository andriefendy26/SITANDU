<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class KegiatanPostsChart extends ChartWidget
{
    protected ?string $heading = 'Kegiatan Posts Chart';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
