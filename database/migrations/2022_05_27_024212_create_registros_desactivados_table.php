<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosDesactivadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_desactivados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('tipo_modelo', 100);
            $table->bigInteger('modelo_id')->unsigned();
            $table->timestamps();

            $table->index('usuario_id');

            $table->foreign('usuario_id')->references('id')->on('tbl_usuarios')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros_desactivados');
    }
}
