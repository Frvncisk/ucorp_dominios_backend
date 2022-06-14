<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTiposDeServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tipos_de_servicios', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nombre_servicio', 200);
            $table->timestamps();
        });

        Schema::table('tbl_tipos_de_servicios', function (Blueprint $table) {
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
        Schema::dropIfExists('tbl_tipos_de_servicios');
    }
}
