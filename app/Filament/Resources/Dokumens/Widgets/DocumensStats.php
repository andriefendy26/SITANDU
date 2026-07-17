<?php

namespace App\Filament\Resources\Dokumens\Widgets;

use App\Models\Dokumen;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumensStats extends StatsOverviewWidget
{
    public static function canView(): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'admin', 'Pengunjung']);
    }

    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Dokumen', Dokumen::unless(auth()->user()->hasRole('super_admin'), function ($query) {
                            $query->where('id_user', auth()->id());
                        })->count())
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
