<?php

namespace App\Filament\Resources\Articles\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Article;

class ArtikelStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
             Stat::make('Total Artikel', Article::count())
                ->description('Artikel diterbitkan')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info')
                ->chart(
                    Article::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->limit(7)
                        ->pluck('count')
                        ->toArray()
                ),
        ];
    }
}
