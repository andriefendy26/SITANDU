<?php

namespace App\Http\Controllers;
 
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokumen::with(['user', 'jenisDokumen'])->latest();
 
        if ($request->filled('jenis')) {
            $query->where('id_jenis_dokumen', $request->jenis);
        }
 
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('note', 'like', '%' . $request->search . '%');
            });
        }
 
        $dokumens      = $query->paginate(15);
        $jenisDokumens = JenisDokumen::withCount('dokumen')->orderBy('title')->get();
 
        return view('dokumen', compact('dokumens', 'jenisDokumens'));
    }
 
    public function download($id)
    {
        $dokumen = Dokumen::findOrFail($id);
 
        if (!Storage::disk('public')->exists($dokumen->path)) {
            abort(404, 'File tidak ditemukan.');
        }
 
        return Storage::disk('public')->download($dokumen->path, $dokumen->title . '.' . pathinfo($dokumen->path, PATHINFO_EXTENSION));
    }
}
