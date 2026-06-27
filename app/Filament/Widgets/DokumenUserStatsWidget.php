<?php

namespace App\Filament\Widgets;

use App\Models\Dokumen;
use App\Models\JenisDokumen;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DokumenUserStatsWidget extends BaseWidget
{
    public ?int $userId = null;

    protected function getStats(): array
    {
        if (! $this->userId) {
            return [];
        }

        $base = Dokumen::where('id_user', $this->userId);

        $stats = [
            Stat::make('Total Dokumen', (clone $base)->count())
                ->description('Semua dokumen')
                ->icon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Upload Bulan Ini', (clone $base)
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count())
                ->description(now()->translatedFormat('F Y'))
                ->icon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Jenis Dipakai', (clone $base)
                ->distinct('id_jenis_dokumen')
                ->count('id_jenis_dokumen'))
                ->description('Dari ' . JenisDokumen::count() . ' jenis tersedia')
                ->icon('heroicon-m-tag')
                ->color('warning'),
        ];

        // Tambah stat per jenis dokumen
        $perJenis = JenisDokumen::withCount([
            'dokumen' => fn($q) => $q->where('id_user', $this->userId),
        ])->get();

        foreach ($perJenis as $jenis) {
            $stats[] = Stat::make($jenis->title, $jenis->dokumen_count)
                ->icon('heroicon-m-document-arrow-down')
                ->color($jenis->dokumen_count > 0 ? 'primary' : 'gray');
        }

        return $stats;
    }
}