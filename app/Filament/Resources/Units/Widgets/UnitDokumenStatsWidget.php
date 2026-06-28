<?php
// app/Filament/Resources/Units/Widgets/UnitDokumenStatsWidget.php

namespace App\Filament\Resources\Units\Widgets;

use App\Models\Dokumen;
use App\Models\Article;
use App\Models\JenisDokumen;
use App\Models\KegiatanOpd;
use App\Models\KegiatanPosyandu;
use App\Models\Unit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UnitDokumenStatsWidget extends BaseWidget
{
    public ?int $unitId = null;

    protected function getStats(): array
    {
        if (! $this->unitId) {
            return [];
        }

        $unit = Unit::with('users')->find($this->unitId);

        if (! $unit) {
            return [];
        }

        // Ambil semua id_user yang ada di unit ini
        $userIds = $unit->users->pluck('id');

        // Base queries
        $baseDokumen      = Dokumen::whereIn('id_user', $userIds);
        $baseArtikel      = Article::whereIn('id_user', $userIds);
        $baseKegiatanOpd  = KegiatanOpd::whereIn('id_user', $userIds);
        $baseKegiatanPos  = KegiatanPosyandu::whereIn('id_user', $userIds);

        $stats = [
            Stat::make('Total Pengguna', $userIds->count())
                ->description('Pengguna di unit ' . $unit->name)
                ->icon('heroicon-m-users')
                ->color('info'),

            Stat::make('Total Artikel', (clone $baseArtikel)->count())
                ->description('Artikel diterbitkan')
                ->icon('heroicon-m-newspaper')
                ->color('danger'),

            Stat::make('Total Kegiatan OPD', (clone $baseKegiatanOpd)->count())
                ->description('Kegiatan OPD unit ini')
                ->icon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make('Total Kegiatan Posyandu', (clone $baseKegiatanPos)->count())
                ->description('Kegiatan Posyandu unit ini')
                ->icon('heroicon-m-heart')
                ->color('danger'),

            Stat::make('Total Dokumen', (clone $baseDokumen)->count())
                ->description('Semua dokumen unit ini')
                ->icon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Upload Bulan Ini', (clone $baseDokumen)
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count())
                ->description(now()->translatedFormat('F Y'))
                ->icon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Jenis Dipakai', (clone $baseDokumen)
                ->distinct('id_jenis_dokumen')
                ->count('id_jenis_dokumen'))
                ->description('Dari ' . JenisDokumen::count() . ' jenis tersedia')
                ->icon('heroicon-m-tag')
                ->color('warning'),
        ];

        // Stat per jenis dokumen
        $perJenis = JenisDokumen::withCount([
            'dokumen' => fn($q) => $q->whereIn('id_user', $userIds),
        ])->get();

        foreach ($perJenis as $jenis) {
            $stats[] = Stat::make($jenis->title, $jenis->dokumen_count)
                ->description('Dokumen ' . $jenis->title)
                ->icon('heroicon-m-document-arrow-down')
                ->color($jenis->dokumen_count > 0 ? 'primary' : 'gray');
        }

        return $stats;
    }
}