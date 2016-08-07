<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categorias', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('idCategoriaPai')->nullable();
            $table->foreign('idCategoriaPai')->references('id')->on('Categorias');

            $table->string('nomeCategoria');
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
