<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblComputadoresModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_computadores_modelos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('marca_id')->unsigned();
            $table->string('nombre', 100);

            $table->index('marca_id');
            $table->foreign('marca_id')->references('id')->on('tbl_computadores_modelos_marcas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_computadores_modelos');
    }
}
