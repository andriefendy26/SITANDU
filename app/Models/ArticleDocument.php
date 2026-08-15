<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleDocument extends Model
{
    use HasFactory;

    protected $table = 'article_documents';

    protected $fillable = [
        'id_article',
        'file_path',
        'document_type',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
}
