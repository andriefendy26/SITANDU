<?php
namespace App\Http\Controllers;
 
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;
 
class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['user', 'category', 'documents'])->latest();
 
        if ($request->filled('kategori')) {
            $query->where('id_category_articles', $request->kategori);
        }
 
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }
 
        $artikels = $query->paginate(9);
        $kategoris = CategoryArticle::orderBy('name')->get();
 
        return view('artikel', compact('artikels', 'kategoris'));
    }
 
    public function show($slug)
    {
        $artikel = Article::with(['user', 'category', 'documents'])
            ->where('slug', $slug)
            ->orWhere('id', $slug)
            ->firstOrFail();
 
        return view('artikel-detail', compact('artikel'));
    }
}
