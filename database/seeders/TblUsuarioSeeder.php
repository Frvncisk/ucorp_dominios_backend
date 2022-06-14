<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Tbl_usuario;
use App\Models\Tbl_role;

class TblUsuarioSeeder extends Seeder
{
    public function run()
    {
        $role_admin = Tbl_role::firstWhere('name','=' , 'Administrador');
        Tbl_usuario::firstOrcreate([
            'id' => 1
        ],[
            'nombre' => 'Administrador',
            'primer_apellido' => 'Admin1',
            'segundo_apellido' => 'Admin2',
            'nom_usuario' => 'Admin',
            'correo' => 'admin@admin.cl',
            'password' => Hash::make('admin.1234')
        ])->assignRole($role_admin);

        $role_user = Tbl_role::firstWhere('name','=' , 'Usuario');
        Tbl_usuario::firstOrcreate([
            'id' => 1
        ],[
            'nombre' => 'Usuario',
            'primer_apellido' => 'Usuar1',
            'segundo_apellido' => 'Usuar2',
            'nom_usuario' => 'Usuario',
            'correo' => 'usuario@usuario.cl',
            'password' => Hash::make('usuario.1234')
        ])->assignRole( $role_user );
    }
}
