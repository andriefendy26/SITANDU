<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogPostChart extends ChartWidget
{
    protected ?string $heading = 'Blog Post Chart';
    protected static ?int $sort = 2;

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
