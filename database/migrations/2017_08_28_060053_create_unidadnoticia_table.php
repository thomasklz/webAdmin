<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadnoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadnoticia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idNoticias')->unsigned();
            $table->index('idNoticias');
            $table->foreign('idNoticias')->references('id')->on('noticias'); 
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
        Schema::dropIfExists('unidadnoticia');
    }
}
