<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivosOnTables extends Migration
{
    public function up()
    {
        Schema::table('tbl_usuarios', function (Blueprint $table) {
            $table->boolean('activo')->default(true)->after('id');
        });

        Schema::table('tbl_tipos_de_servicios', function (Blueprint $table) {
            $table->boolean('activo')->default(true)->after('id');
        });
    }

    public function down()
    {
        //
    }
}
