<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Tbl_permiso extends Permission
{
    // const CREATED_AT = 'fecha_creacion';
    // const UPDATED_AT = 'fecha_actualizacion';
    protected $table = 'tbl_permisos';
    use HasFactory;
}
