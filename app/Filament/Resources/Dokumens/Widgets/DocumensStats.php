<?php

namespace App\Filament\Resources\Dokumens\Widgets;

use App\Models\Dokumen;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumensStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Dokumen', Dokumen::count())
                ->description('Dokumen tersedia')
                ->descriptionIcon('heroicon-m-document-arrow-down')
                ->color('success')
                ->chart(
                    Dokumen::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->limit(7)
                        ->pluck('count')
                        ->toArray()
                ),
        ];
    }
}
