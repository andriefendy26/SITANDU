<?php

namespace App\Filament\Resources\Dokumens\Widgets;

use App\Models\Dokumen;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumensStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();

        // super_admin dan Pengunjung -> lihat total SEMUA dokumen
        // role lain (mis. admin biasa/staff) -> hanya dokumen miliknya sendiri
        $isPublicView = $user->hasRole(['super_admin', 'Pengunjung']);

        $query = Dokumen::query();

        if (! $isPublicView) {
            $query->where('id_user', $user->id);
        }

        return [
            Stat::make('Total Dokumen', (clone $query)->count())
                ->description('Dokumen tersedia')
                ->descriptionIcon('heroicon-m-document-arrow-down')
                ->color('success')
                ->chart(
                    (clone $query)
                        ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->limit(7)
                        ->pluck('count')
                        ->toArray()
                ),
        ];
    }
}