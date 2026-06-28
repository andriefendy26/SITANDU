<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    //
    use HasFactory;
 
    protected $table = 'category_articles';
 
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
 
    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_category_articles');
    }
}
