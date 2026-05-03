<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLayanan;
use App\Models\KegiatanOpd;
use App\Models\Article;
use App\Models\Dokumen;

class HomeController extends Controller
{
    public function index()
    {
        // Seksi Layanan: ambil 6 kategori layanan terbaru
        $layanan = KategoriLayanan::latest()->take(6)->get();

        // Seksi Kegiatan OPD: ambil 3 kegiatan terbaru beserta kategorinya
        $kegiatan = KegiatanOpd::with(['user', 'kategori'])
            ->latest()
            ->take(3)
            ->get();

        // Seksi Artikel: ambil 3 artikel terbaru beserta kategori & user
        $artikels = Article::with(['user', 'category'])
            ->latest()
            ->take(3)
            ->get();

        // Seksi Dokumen: ambil 6 dokumen terbaru beserta jenis & user
        $dokumens = Dokumen::with(['user', 'jenisDokumen'])
            ->latest()
            ->take(6)
            ->get();

        // Stats untuk bagian counter di homepage
        $stats = [
            'layanan'  => KategoriLayanan::count(),
            'dokumen'  => Dokumen::count(),
            'kegiatan' => KegiatanOpd::count(),
            'artikel'  => Article::count(),
        ];

        return view('welcome', compact(
            'layanan',
            'kegiatan',
            'artikels',
            'dokumens',
            'stats'
        ));
    }
}