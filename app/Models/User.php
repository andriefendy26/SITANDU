<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
// use App\Model\Dokumen;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $table = 'users';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'id_unit',
    ];

    /**
     * Hidden attributes
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function units()
    {
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, "id_user");
    }

    // public function dokumen()
    // {
    //     return $this->hasMany(Dokumen::class, 'id_jenis_dokumen');
    // }
    
}