<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosPessoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_pessoais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('cpf', 11)->unique();
            $table->string('rg')->unique();
            $table->date('nascimento');
            $table->string('genero');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['user_id']);
            $table->index(['user_id']);
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
        Schema::dropIfExists('dados_pessoais');
    }
}
