<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_personal extends Model
{
    use HasFactory;

    protected $table = 'tbl_personales';

    protected $fillable = [
        'nombres',
        'primer_apellido',
        'segundo_apellido',
    ];
}
