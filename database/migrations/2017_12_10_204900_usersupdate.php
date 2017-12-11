<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usersupdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users', function (Blueprint $table) {
            $table->integer('idtipousers')->unsigned();
            $table->index('idtipousers');
            $table->foreign('idtipousers')->references('id')->on('tipousers'); 
            $table->integer('idUnidadacademica')->unsigned()->nullable();
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
        //
    }
}
