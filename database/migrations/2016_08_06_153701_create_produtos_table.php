<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produtos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('idCategoria');
            $table->foreign('idCategoria')->references('id')->on('Categorias');

            # o caminho da foto deve possuir 36 caracteres
            $table->string('fotoProduto', 36)->nullable();

            $table->string('nomeProduto');

            $table->decimal('precoProduto', 8, 2)->default(0.00);

            $table->decimal('estoqueProduto', 8, 2)->default(0.00);

            # produtos em destaque
            $table->boolean('destaqueProduto')->default(0);

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
        Schema::drop('Produtos');
    }
}
