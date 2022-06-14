<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_computadores_componente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tbl_computadores_componentes';

    protected $fillable = [
        'nombre' ,
    ];
}
