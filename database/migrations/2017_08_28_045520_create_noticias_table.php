<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',150);
            $table->string('resumen',300);
            $table->longText('contenido');
            $table->boolean('publicar');
            $table->dateTime('fechaPublicacion');
            $table->integer('idCategoria')->unsigned();
            $table->index('idCategoria');
            $table->foreign('idCategoria')->references('id')->on('categorias');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
