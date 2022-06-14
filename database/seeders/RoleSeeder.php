<?php

namespace Database\Seeders;

use App\Models\Tbl_permiso;
use App\Models\Tbl_role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Tbl_role::firstOrCreate(['name' => 'Administrador']);
        $role_user = Tbl_role::firstOrCreate(['name' => 'Usuario']);

        Tbl_permiso::firstOrCreate([ 'name' => 'todo.index' ])->syncRoles([ $role_admin , $role_user]);
        Tbl_permiso::firstOrCreate([ 'name' => 'todo.create' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'todo.update' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'todo.delete' ])->syncRoles([ $role_admin ]);

        Tbl_permiso::firstOrCreate([ 'name' => 'usuario.index' ])->syncRoles([ $role_admin ]);
        // Tbl_permiso::firstOrCreate([ 'name' => 'usuario.create' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'usuario.store' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'usuario.show' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'usuario.update' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'usuario.delete' ])->syncRoles([ $role_admin ]);

        Tbl_permiso::firstOrCreate([ 'name' => 'servicio.index' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'servicio.store' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'servicio.data' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'servicio.show' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'servicio.update' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'servicio.destroy' ])->syncRoles([ $role_admin ]);

        Tbl_permiso::firstOrCreate([ 'name' => 'tipo_servicio.index' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'tipo_servicio.store' ])->syncRoles([ $role_admin ]);
        // Tbl_permiso::firstOrCreate([ 'name' => 'tipo_servicio.data' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'tipo_servicio.show' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'tipo_servicio.update' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'tipo_servicio.destroy' ])->syncRoles([ $role_admin ]);

        Tbl_permiso::firstOrCreate([ 'name' => 'lapso_servicio.index' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'lapso_servicio.store' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'lapso_servicio.data' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'lapso_servicio.show' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'lapso_servicio.update' ])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'lapso_servicio.destroy' ])->syncRoles([ $role_admin ]);


        Tbl_permiso::firstOrCreate([ 'name' => 'computador.index'])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'computador.store'])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'computador.data'])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'computador.show'])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'computador.update'])->syncRoles([ $role_admin ]);
        Tbl_permiso::firstOrCreate([ 'name' => 'computador.destroy'])->syncRoles([ $role_admin ]);

    }
}
