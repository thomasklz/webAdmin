<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadservicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadservicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idServicio')->unsigned();
            $table->index('idServicio');
            $table->foreign('idServicio')->references('id')->on('servicio'); 
            $table->integer('idUnidadacademica')->unsigned();
            $table->index('idUnidadacademica');
            $table->foreign('idUnidadacademica')->references('id')->on('unidadAcademica');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidadservicio');
    }
}
