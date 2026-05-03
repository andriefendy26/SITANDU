<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use App\Models\Article;
use App\Models\Dokumen;
use App\Models\InformasiLayanan;
use App\Models\KegiatanOpd;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;



class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
          return [
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

            Stat::make('Informasi Layanan', InformasiLayanan::count())
                ->description('Layanan publik aktif')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning'),

            Stat::make('Kegiatan OPD', KegiatanOpd::count())
                ->description('Program & kegiatan')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('danger'),
        ];
    }
}
