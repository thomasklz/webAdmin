<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadeventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEvento')->unsigned();
            $table->index('idEvento');
            $table->foreign('idEvento')->references('id')->on('eventos'); 
            $table->integer('idUnidadacademica')->unsigned();
            $table->index('idUnidadacademica');
            $table->foreign('idUnidadacademica')->references('id')->on('unidadAcademica');   
            $table->boolean('estado');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('unidadeventos');
    }
}
