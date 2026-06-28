<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Dokumen;
use App\Models\InformasiLayanan;
use App\Models\KegiatanOpd;
use App\Models\KegiatanPosyandu;
use App\Models\JenisDokumen;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();
        $isSuperAdmin = $user->hasRole('super_admin');

        // Helper closure: filter by user jika bukan super_admin
        $forUser = fn($query) => $isSuperAdmin
            ? $query
            : $query->where('id_user', $user->id);

        // ── Totals ──────────────────────────────────────────────
        $totalDokumen       = $forUser(Dokumen::query())->count();
        $totalArtikel       = $forUser(Article::query())->count();
        $totalKegiatanOpd   = $forUser(KegiatanOpd::query())->count();
        $totalKegiatanPosyandu = $forUser(KegiatanPosyandu::query())->count();
        $totalLayanan       = $forUser(InformasiLayanan::query())->count();

        // ── Chart data helper ────────────────────────────────────
        $chart = fn($query) => (clone $query)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->limit(7)
            ->pluck('count')
            ->toArray();

        // ── Per jenis dokumen ────────────────────────────────────
        $perJenis = JenisDokumen::withCount([
            'dokumen' => fn($q) => $isSuperAdmin
                ? $q
                : $q->where('id_user', $user->id),
        ])->get();

        // ── Stats utama ──────────────────────────────────────────
        $stats = [
            Stat::make('Total Dokumen', $totalDokumen)
                ->description('Semua dokumen tersedia')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success')
                ->chart($chart($forUser(Dokumen::query()))),

            Stat::make('Total Artikel', $totalArtikel)
                ->description('Artikel diterbitkan')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info')
                ->chart($chart($forUser(Article::query()))),

            Stat::make('Kegiatan OPD', $totalKegiatanOpd)
                ->description('Program & kegiatan OPD')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning')
                ->chart($chart($forUser(KegiatanOpd::query()))),

            Stat::make('Kegiatan Posyandu', $totalKegiatanPosyandu)
                ->description('Kegiatan posyandu')
                ->descriptionIcon('heroicon-m-heart')
                ->color('danger')
                ->chart($chart($forUser(KegiatanPosyandu::query()))),

            Stat::make('Informasi Layanan', $totalLayanan)
                ->description('Layanan publik aktif')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('primary'),
        ];

        // Khusus super_admin: tambah total user & unit
        if ($isSuperAdmin) {
            $stats[] = Stat::make('Total Pengguna', User::count())
                ->description('Akun terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray')
                ->chart($chart(User::query()));
        }

        // ── Per jenis dokumen ────────────────────────────────────
        foreach ($perJenis as $jenis) {
            $stats[] = Stat::make($jenis->title, $jenis->dokumen_count)
                ->description('Dokumen ' . $jenis->title)
                ->descriptionIcon('heroicon-m-document-arrow-down')
                ->color('info');
        }

        return $stats;
    }

    public function getColumns(): int|array
    {
        return 3;
    }
}