<?php

namespace App\Filament\Resources\InformasiLayanans\Widgets;

use App\Models\InformasiLayanan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InformasiLayanansStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Informasi Layanan', InformasiLayanan::count())
                ->description('Layanan publik aktif')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning'),
        ];
    }
}
