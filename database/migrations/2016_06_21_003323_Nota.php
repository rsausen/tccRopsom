<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nota extends Migration
{
    public function up()
    {
        //
        Schema::create('nota', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total');
            $table->date('data');
            $table->integer('fornecedor_id')->unsigned();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedor');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
