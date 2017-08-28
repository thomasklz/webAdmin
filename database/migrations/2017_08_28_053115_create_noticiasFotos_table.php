<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticiasFotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fotos',60);
            $table->string('principal',3);
            $table->boolean('publicar');
            $table->integer('idNoticias')->unsigned();
            $table->index('idNoticias');
            $table->foreign('idNoticias')->references('id')->on('noticias');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticiasFotos');
    }
}
