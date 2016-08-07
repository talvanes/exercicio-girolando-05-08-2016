<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pessoas', function (Blueprint $table) {
            # user id
            $table->bigIncrements('id');

            $table->string('nomePessoa');
            $table->string('emailPessoa');
            $table->string('senhaPessoa');

            # pessoa será criada ativa
            $table->boolean('statusPessoa')->default(1);

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
        Schema::drop('Pessoas');
    }
}
