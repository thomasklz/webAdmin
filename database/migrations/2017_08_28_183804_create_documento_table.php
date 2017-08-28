<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200);
            $table->date('fecha');
            $table->boolean('estado');
            $table->integer('idCategoriadocumento')->unsigned();
            $table->index('idCategoriadocumento');
            $table->foreign('idCategoriadocumento')->references('id')->on('categoriadocumento'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
}
