<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DokumentasiKegiatanPosyandu extends Model
{
    //
    use HasFactory;

    protected $table = 'dokumentasi_kegiatan_posyandus';

    protected $fillable = [
        'id_kegiatan_posyandu',
        'file_path',
    ];

    public function kegiatanPosyandu()
    {
        return $this->belongsTo(KegiatanPosyandu::class, 'id_kegiatan_posyandu');
    }
}
