<?php
// ══════════════════════════════════════════════
// LayananController.php
// app/Http/Controllers/LayananController.php
// ══════════════════════════════════════════════
namespace App\Http\Controllers;

use App\Models\InformasiLayanan;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        // Untuk grouped view, ambil semua kategori beserta relasinya
        $kategoris = KategoriLayanan::with(['informasiLayanan' => function ($q) use ($request) {
            if ($request->filled('search')) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            }
        }])->orderBy('name')->get();

        // Untuk flat/paginated view (filter/search aktif)
        $query = InformasiLayanan::with(['user', 'kategori'])->latest();

        if ($request->filled('kategori')) {
            $query->where('id_kategori_layanan', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $layanans = $query->paginate(12);

        return view('layanan', compact('layanans', 'kategoris'));
    }

    public function show($id)
    {
        $layanan = InformasiLayanan::with(['user', 'kategori'])->findOrFail($id);

        // Layanan terkait dari kategori yang sama
        $related = InformasiLayanan::where('id_kategori_layanan', $layanan->id_kategori_layanan)
            ->where('id', '!=', $layanan->id)
            ->latest()
            ->take(3)
            ->get();

        return view('layanan-detail', compact('layanan', 'related'));
    }
}

