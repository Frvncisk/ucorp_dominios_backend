<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_computadores_modelos_marca extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tbl_computadores_modelos_marcas';

    protected $fillable = [
        'nombre'
    ];
}
