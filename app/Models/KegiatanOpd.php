<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanOpd extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_opd';

    protected $fillable = [
        'id_user',
        'id_kategori_kegiatan_opd',
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
        return $this->belongsTo(KategoriKegiatanOpd::class, 'id_kategori_kegiatan_opd');
    }

    public function dokumentasi()
    {
        return $this->hasMany(DokumentasiKegiatanOpd::class, 'id_kegiatan_opd');
    }
}