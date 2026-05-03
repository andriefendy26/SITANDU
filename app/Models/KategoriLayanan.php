<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    use HasFactory;

    protected $table = 'kategori_layanan';

    protected $fillable = [
        'name',
        'deskripsi',
    ];

    // Relationships
    public function informasiLayanan()
    {
        return $this->hasMany(InformasiLayanan::class, 'id_kategori_layanan');
    }
}