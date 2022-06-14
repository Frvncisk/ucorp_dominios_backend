<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblComputadorTblComponenteTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_computador_tbl_componente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tbl_computador_id')->unsigned();
            $table->smallinteger('tbl_componente_id')->unsigned();

            $table->index('tbl_computador_id');
            $table->index('tbl_componente_id');

            $table->foreign('tbl_computador_id')
                ->references('id')
                ->on('tbl_computadores')
                ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreign('tbl_componente_id')
                ->references('id')
                ->on('tbl_computadores_componentes')
                ->onUpdate('cascade')
            ->onDelete('restrict');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_computador_tbl_componente');
    }
}
