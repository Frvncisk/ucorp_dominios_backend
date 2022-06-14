<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblServiciosLapsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_servicios_lapsos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('servicio_tipo_id')->unsigned();
            $table->smallInteger('dias_minimos')->unsigned();
            $table->smallInteger('dias_maximos')->unsigned();
            $table->string('color', 6);
            $table->timestamps();

            $table->index('servicio_tipo_id');
            $table->foreign('servicio_tipo_id')
                ->references('id')
                ->on('tbl_tipos_de_servicios')
            ->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('tbl_servicios_lapsos', function (Blueprint $table) {
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
        Schema::dropIfExists('tbl_servicios_lapsos');
    }
}
