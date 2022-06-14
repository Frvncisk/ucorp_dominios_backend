<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;


class Tbl_usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
    protected $guard_name = 'api';

    protected $fillable = [
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'nom_usuario',
        'correo',
        'password',
        'activo',
    ];

    protected $attributes = [
        'activo' => 1,
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        $query->where('activo', 1);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
