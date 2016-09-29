<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Honorario extends Migration
{
    public function up()
    {
        //
        Schema::create('honorario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('funcionario');
            $table->string('horas');
            $table->decimal('valor');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
