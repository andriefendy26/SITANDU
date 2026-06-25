<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DokumentasiKegiatanOpd extends Model
{
    //
    use HasFactory;

    protected $table = 'dokumentasi_kegiatan_opd';

    protected $fillable = [
        'id_kegiatan_opd',
        'file_path',
    ];

    public function kegiatanOpd()
    {
        return $this->belongsTo(KegiatanOpd::class, 'id_kegiatan_opd');
    }
}
