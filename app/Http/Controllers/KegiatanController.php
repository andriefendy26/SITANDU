<?php
// ══════════════════════════════════════════════
// KegiatanController.php
// ══════════════════════════════════════════════
namespace App\Http\Controllers;
 
use App\Models\KegiatanOpd;
use App\Models\KategoriKegiatanOpd;
use Illuminate\Http\Request;
 
class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = KegiatanOpd::with(['user', 'kategori'])->latest();
 
        if ($request->filled('kategori')) {
            $query->where('id_kategori_kegiatan_opd', $request->kategori);
        }
 
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }
 
        $kegiatans = $query->paginate(9);
        $kategoris  = KategoriKegiatanOpd::orderBy('name')->get();
 
        return view('kegiatan', compact('kegiatans', 'kategoris'));
    }
 
    public function show($slug)
    {
        $kegiatan = KegiatanOpd::with(['user', 'kategori'])
            ->where('slug', $slug)
            ->orWhere('id', $slug)
            ->firstOrFail();
 
        return view('kegiatan-detail', compact('kegiatan'));
    }
}