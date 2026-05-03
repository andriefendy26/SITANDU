<?php

namespace App\Filament\Resources\KegiatanOpds\Widgets;

use App\Models\KegiatanOpd;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KegiatanOpdsStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Kegiatan OPD', KegiatanOpd::count())
                ->description('Program & kegiatan')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('danger'),
        ];
    }
}
