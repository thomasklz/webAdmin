<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadproyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadproyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProyecto')->unsigned();
            $table->index('idProyecto');
            $table->foreign('idProyecto')->references('id')->on('proyecto'); 
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
         Schema::dropIfExists('unidadproyecto');
    }
}
