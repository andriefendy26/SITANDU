<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    use HasFactory;

    protected $table = 'jenis_dokumen';

    protected $fillable = [
        'title',
        'note',
    ];

    // Relationships
    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_jenis_dokumen');
    }
}