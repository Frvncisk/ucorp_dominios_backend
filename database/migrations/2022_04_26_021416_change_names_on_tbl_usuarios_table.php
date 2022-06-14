<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNamesOnTblUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_usuarios', function (Blueprint $table) {
            $table->renameColumn('name', 'nombre');
        });
        Schema::table('tbl_usuarios', function (Blueprint $table) {
            $table->string('primer_apellido', 255)->after('nombre');
            $table->string('segundo_apellido', 255)->after('primer_apellido');
            $table->string('nom_usuario', 255)->after('segundo_apellido');
            $table->renameColumn('email_verified_at', 'correo_verificacion_at');
            $table->renameColumn('email', 'correo');
            // $table->renameColumn('password', 'contrasenna');
            $table->renameColumn('created_at', 'fecha_creacion');
            $table->renameColumn('updated_at', 'fecha_actualizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
