<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiLayananDocument extends Model
{
    use HasFactory;

    protected $table = 'informasi_layanan_documents';

    protected $fillable = [
        'id_informasi_layanan',
        'file_path',
        'document_type',
    ];

    public function informasiLayanan()
    {
        return $this->belongsTo(InformasiLayanan::class, 'id_informasi_layanan');
    }
}
