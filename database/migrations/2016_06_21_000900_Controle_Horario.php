<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ControleHorario extends Migration
{
    public function up()
    {
        //
        Schema::create('controle_horario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('funcionario');
            $table->time('entrada');
            $table->time('saida');
            $table->date('dataEntrada');
            $table->date('dataSaida');
            $table->boolean('ativo');
            $table->decimal('valor', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
