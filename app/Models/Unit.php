<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    //
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_unit');
    }

    public function kegiatanOpd()
    {
        return $this->hasMany(kegiatanOpd::class, 'id_unit');
    }

    public function kegiatanPosyandu()
    {
        return $this->hasMany(kegiatanPosyandu::class, 'id_unit');

    }
}