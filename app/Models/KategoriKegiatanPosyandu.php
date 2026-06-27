<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class KategoriKegiatanPosyandu extends Model
{
    //
    use HasFactory;
    
    protected $table = 'kategori_kegiatan_posyandus';

    protected $fillable = [
        'name',
    ];

    public function kegiatanPosyandu()
    {
        return $this->hasMany(KegiatanPosyandu::class, 'id_kategori_kegiatan_posyandu');
    }
}
