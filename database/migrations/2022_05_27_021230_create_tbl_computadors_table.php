<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblComputadorsTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_computadores', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('activo')->default(true);
            $table->smallInteger('modelo_id')->unsigned();
            $table->integer('personal_id')->unsigned()->nullable();
            $table->string('codigo', 6);
            $table->timestamps();

            $table->unique('codigo');
            $table->index('modelo_id');
            $table->index('personal_id');

            $table->foreign('modelo_id')
                ->references('id')
                ->on('tbl_computadores_modelos')
                ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreign('personal_id')
                ->references('id')
                ->on('tbl_personales')
                ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_computadores');
    }
}
