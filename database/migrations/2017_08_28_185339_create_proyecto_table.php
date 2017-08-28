<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('autor',100);
            $table->string('titulo',300);
            $table->longText('contenido');
            $table->string('foto',30);
            $table->string('estadoProyecto',20);
            $table->date('fecha');
            $table->boolean('estado');
            $table->integer('idCategoriaproyecto')->unsigned();
            $table->index('idCategoriaproyecto');
            $table->foreign('idCategoriaproyecto')->references('id')->on('categoriaproyecto'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('proyecto');
    }
}
