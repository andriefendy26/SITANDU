<?php

namespace App\Http\Controllers;

 
use App\Models\KegiatanPosyandu;
use App\Models\KategoriKegiatanPosyandu;
use Illuminate\Http\Request;

class KegiatanPosyanduController extends Controller
{
    public function index(Request $request)
    {
        $query = KegiatanPosyandu::with(['user', 'kategori'])->latest();
 
        if ($request->filled('kategori')) {
            $query->where('id_kategori_kegiatan_posyandu', $request->kategori);
        }
 
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }
 
        $kegiatans = $query->paginate(9);
        $kategoris  = KategoriKegiatanPosyandu::orderBy('name')->get();
 
        return view('kegiatanPosyandu', compact('kegiatans', 'kategoris'));
    }
 
    public function show($slug)
    {
        $kegiatan = KegiatanPosyandu::with(['user', 'kategori', 'dokumentasi'])
            // ->where('slug', $slug)
            ->orWhere('id', $slug)
            ->firstOrFail();
        
        // $dokumentasi = DokumentasiKegiatanOpd::with()

        return view('kegiatanPosyandu-detail', compact('kegiatan'));
    }
}
