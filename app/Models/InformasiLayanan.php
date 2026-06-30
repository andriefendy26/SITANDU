<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class InformasiLayanan extends Model
{
    use HasFactory;
 
    protected $table = 'informasi_layanan';
 
    protected $fillable = [
        'id_user',
        'id_kategori_layanan',
        'title',
        'content',
        'image'
    ];
 
    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
 
    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'id_kategori_layanan');
    }
}
