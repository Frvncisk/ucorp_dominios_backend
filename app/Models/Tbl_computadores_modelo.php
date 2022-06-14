<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_computadores_modelo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tbl_computadores_modelos';

    protected $fillable = [
        'marca_id' ,
        'nombre' ,
    ];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Tbl_computadores_modelos_marca::class, 'marca_id', 'id');
    }

}
