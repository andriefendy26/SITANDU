<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KegiatanPosyandu extends Model
{
    //
    use HasFactory;

    protected $table = 'kegiatan_posyandus';

     protected $fillable = [
        'id_user',
        'id_kategori_kegiatan_posyandu',
        'title',
        'content',
        'image',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriKegiatanPosyandu::class, 'id_kategori_kegiatan_posyandu');
    }

    public function dokumentasi()
    {
        return $this->hasMany(DokumentasiKegiatanPosyandu::class, 'id_kegiatan_posyandu');
    }
}
