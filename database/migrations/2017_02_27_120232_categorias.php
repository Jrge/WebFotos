<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categorias', function (Blueprint $table) {
            $table->increments('idCategoria')->unique();
            $table->string('Titulo');
            $table->string('descripcion');
            $table->integer('limite');
            $table->string('icono');
            $table->string('banner');
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
        Schema::drop('Categorias');
    }
}
