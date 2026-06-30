<?php

namespace App\Http\Controllers;

use App\Models\InformasiLayanan;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        // Halaman kategori (default)
        if (!$request->has('kategori') && !$request->has('search')) {
            $kategoris = KategoriLayanan::withCount('informasiLayanan')
                ->with('informasiLayanan')
                ->get();

            return view('layanan', compact('kategoris'));
        }

        // Halaman list per kategori / search
        $layanans = InformasiLayanan::query()
            ->when($request->kategori, fn($q) => $q->where('id_kategori_layanan', $request->kategori)) // ✅ fix
            ->when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->with('kategori')
            ->paginate(12);

        $kategoris = KategoriLayanan::with('informasiLayanan')->get();

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