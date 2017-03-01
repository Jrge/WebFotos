<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fotos', function (Blueprint $table) {
            $table->increments('idFoto')->unique();
            $table->integer('idCategoria');
            $table->integer('idParticipante');
            $table->string('Titulo');
            $table->string('descripcion');
            $table->string('nombreArchivo');
            $table->integer('votos');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Fotos');
    }
}