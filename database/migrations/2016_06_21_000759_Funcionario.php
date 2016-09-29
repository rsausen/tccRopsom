<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Funcionario extends Migration
{
    public function up()
    {
        //
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('telefone');
            $table->string('nome_responsavel');
            $table->string('telefone_responsavel');
            $table->string('endereco');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
