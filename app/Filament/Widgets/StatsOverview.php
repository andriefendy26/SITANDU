<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Article;
use App\Models\Dokumen;
use App\Models\KategoriLayanan;
use App\Models\User;
use App\Models\KegiatanOpd;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total User', User::count())
                ->description('Total user dalam sistem')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, 28, 30, 32, 35, 38, 40]),
            Stat::make('Total Dokumen', Dokumen::count())
                ->description('Total dokumen dalam sistem')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, 28, 30, 32, 35, 38, 40]),
            Stat::make('Article', Article::count())
                ->description('Total article dalam sistem')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, 28, 30, 32, 35, 38, 40]),
            Stat::make('Kegiatan', KegiatanOpd::count())
                ->description('Total Kegiatan dalam sistem')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, 28, 30, 32, 35, 38, 40]),
        ];
    }
}
