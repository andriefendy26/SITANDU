<?php
// app/Models/Unit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = ['name'];

    // Direct relation
    public function users()
    {
        return $this->hasMany(User::class, 'id_unit');
    }

    // Through users
    public function dokumen()
    {
        return $this->hasManyThrough(
            Dokumen::class,
            User::class,
            'id_unit',   // FK di tabel users → units
            'id_user',   // FK di tabel dokumen → users
        );
    }

    public function kegiatanOpd()
    {
        return $this->hasManyThrough(
            KegiatanOpd::class,
            User::class,
            'id_unit',   // FK di tabel users → units
            'id_user',   // FK di tabel kegiatan_opd → users
        );
    }

    public function kegiatanPosyandu()
    {
        return $this->hasManyThrough(
            KegiatanPosyandu::class,
            User::class,
            'id_unit',   // FK di tabel users → units
            'id_user',   // FK di tabel kegiatan_posyandus → users
        );
    }
}