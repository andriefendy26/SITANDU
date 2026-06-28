<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use App\Models\Article;
use App\Models\Dokumen;
use App\Models\InformasiLayanan;
use App\Models\KegiatanOpd;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\JenisDokumen;


class StatsOverview extends StatsOverviewWidget
{
    // protected function getStats(): array
    // {
    //       return [
    //         Stat::make('Total Artikel', Article::count())
    //             ->description('Artikel diterbitkan')
    //             ->descriptionIcon('heroicon-m-newspaper')
    //             ->color('info')
    //             ->chart(
    //                 Article::selectRaw('DATE(created_at) as date, COUNT(*) as count')
    //                     ->groupBy('date')
    //                     ->orderBy('date')
    //                     ->limit(7)
    //                     ->pluck('count')
    //                     ->toArray()
    //             ),

    //         Stat::make('Total Dokumen', Dokumen::count())
    //             ->description('Dokumen tersedia')
    //             ->descriptionIcon('heroicon-m-document-arrow-down')
    //             ->color('success')
    //             ->chart(
    //                 Dokumen::selectRaw('DATE(created_at) as date, COUNT(*) as count')
    //                     ->groupBy('date')
    //                     ->orderBy('date')
    //                     ->limit(7)
    //                     ->pluck('count')
    //                     ->toArray()
    //             ),

    //         Stat::make('Informasi Layanan', InformasiLayanan::count())
    //             ->description('Layanan publik aktif')
    //             ->descriptionIcon('heroicon-m-clipboard-document-list')
    //             ->color('warning'),

    //         Stat::make('Kegiatan OPD', KegiatanOpd::count())
    //             ->description('Program & kegiatan')
    //             ->descriptionIcon('heroicon-m-calendar-days')
    //             ->color('danger'),
    //     ];
    // }

    protected function getStats(): array
    {
        $isSuperAdmin = auth()->user()->hasRole('super_admin');

        // Base query reusable
        $baseQuery = fn() => Dokumen::unless($isSuperAdmin, fn($q) => $q->where('id_user', auth()->id()));

        // Total keseluruhan
        $totalDokumen = (clone $baseQuery())->count();

        // Total per jenis dokumen
        $perJenis = JenisDokumen::withCount([
            'dokumen' => fn($q) => $isSuperAdmin
                ? $q
                : $q->where('id_user', auth()->id()),
        ])->get();

        // Build stats
        $stats = [
            Stat::make('Total Dokumen', $totalDokumen)
                ->description('Semua dokumen tersedia')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success')
                ->chart(
                    (clone $baseQuery())
                        ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->limit(7)
                        ->pluck('count')
                        ->toArray()
                ),
        ];

        // Tambah stat per jenis dokumen
        foreach ($perJenis as $jenis) {
            $stats[] = Stat::make($jenis->title, $jenis->dokumen_count)
                ->description('Dokumen ' . $jenis->title)
                ->descriptionIcon('heroicon-m-document-arrow-down')
                ->color('info');
        }

        return $stats;
    }

    public function getColumns(): int | array
    {
        return 3;
    }

}   
