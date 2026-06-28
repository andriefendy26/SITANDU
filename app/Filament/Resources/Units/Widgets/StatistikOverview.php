<?php
// app/Filament/Resources/Units/Widgets/UnitStatsWidget.php

namespace App\Filament\Resources\Units\Widgets;

use App\Models\Unit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UnitStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $total = Unit::withCount([ 'users','dokumen', 'kegiatanOpd', 'kegiatanPosyandu'])->get();

        return [
            Stat::make('Total Unit', $total->count())
                ->description('Unit/Dinas terdaftar')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('primary'),

            Stat::make('Total Pengguna', $total->sum('users_count'))
                ->description('Pengguna dari semua unit')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Total Dokumen', $total->sum('dokumen_count'))
                ->description('Dokumen dari semua unit')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),

            Stat::make('Total Kegiatan OPD', $total->sum('kegiatan_opd_count'))
                ->description('Kegiatan OPD dari semua unit')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make('Total Kegiatan Posyandu', $total->sum('kegiatan_posyandu_count'))
                ->description('Kegiatan Posyandu dari semua unit')
                ->descriptionIcon('heroicon-m-heart')
                ->color('danger'),
        ];
    }
}