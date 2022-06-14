<?php

namespace App\Models;

use App\Models\Tbl_tipos_de_servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Tbl_servicio extends Model
{
    use HasFactory;
    protected $appends = [
        'DaysToExpire' ,
    ];
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

   /* protected $casts = [
        'fecha_de_adquisicion' => 'date:d/m/Y',
        'fecha_de_expiracion' => 'date:d/m/Y',
    ];*/

    protected $fillable = [
        'servicio_tipo_id',
        'nombre',
        'fecha_de_adquisicion',
        'fecha_de_expiracion',
    ];

    public function scopeServicioTipoId($query , $tipo_id){
        if($tipo_id){
            return $query->where('servicio_tipo_id' , '=' , $tipo_id);
        }
    }

    public function scopeNombre($query , $nombre){
        if($nombre){
            return $query->where('nombre' , '=' , $nombre);
        }
    }

    public function tipo()
    {
        return $this->belongsTo(Tbl_tipos_de_servicio::class, 'servicio_tipo_id', 'id');
    }

    protected function getDaysToExpireAttribute($key)
    {
        $carbon = new Carbon;
        if( $this->attributes['fecha_de_expiracion'] ){
            return $carbon->diffInDays( $this->attributes['fecha_de_expiracion'] );
        }else{
            return null;
        }

    }

}
