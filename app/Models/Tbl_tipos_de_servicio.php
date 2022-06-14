<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_tipos_de_servicio extends Model
{
    use HasFactory;
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    protected $fillable = [
        'nombre_servicio',
        'activo',
    ];

    protected $attributes = [
        'activo' => 1,
    ];

    public function scopeActive($query)
    {
        $query->where('activo', 1);
    }

}
