<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Tbl_role extends Role
{
    // const CREATED_AT = 'fecha_creacion';
    // const UPDATED_AT = 'fecha_actualizacion';
    protected $table = 'tbl_roles';
    use HasFactory;
}
