<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadredessocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadredessociales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idRedessociales')->unsigned();
            $table->index('idRedessociales');
            $table->foreign('idRedessociales')->references('id')->on('redessociales'); 
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
        Schema::dropIfExists('unidadredessociales');
    }
}
