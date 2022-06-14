<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_servicios_lapso extends Model
{
    use HasFactory;
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    protected $casts = [
        'fecha_de_adquisicion' => 'date:d/m/Y',
        'fecha_de_expiracion' => 'date:d/m/Y',
    ];

    protected $fillable = [
        'servicio_tipo_id',
        'dias_minimos',
        'dias_maximos',
        'color',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tbl_tipos_de_servicio::class, 'servicio_tipo_id', 'id');
    }

}
