<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agenda extends Migration
{
    public function up()
    {
        //
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->text('descricao');
            $table->date('data');
            $table->string('hora');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
