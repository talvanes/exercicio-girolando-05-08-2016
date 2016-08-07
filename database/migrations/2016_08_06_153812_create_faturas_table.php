<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Faturas', function (Blueprint $table) {
            # código da fatura
            $table->bigIncrements('id');

            # a qual cliente pertence a fatura
            $table->unsignedBigInteger('idPessoa');
            $table->foreign('idPessoa')->references('id')->on('Pessoas');
            
            # ip do cliente da fatura
            $table->string('ipClienteFatura');

            $table->decimal('valorFatura')->default(0.00);

            $table->text('obsFatura')->nullable();

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
        Schema::drop('Faturas');
    }
}
