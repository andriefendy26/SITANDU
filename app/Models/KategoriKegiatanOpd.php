<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatanOpd extends Model
{
    use HasFactory;

    protected $table = 'kategori_kegiatan_opd';

    protected $fillable = [
        'name',
    ];

    // Relationships
    public function kegiatanOpd()
    {
        return $this->hasMany(KegiatanOpd::class, 'id_kategori_kegiatan_opd');
    }
}