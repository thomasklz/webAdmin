<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('unidadAcademica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',150);
            $table->string('logo',50);
            $table->longText('frase');
            $table->string('resumen',400);
            $table->longText('contenido');
            $table->string('foto',30);
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
          Schema::dropIfExists('unidadAcademica');
    }
}
