<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('cidades', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->integer('id_estado')->unsigned();
        $table->foreign('id_estado')->references('id')->on('estados');
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
        //
    }
}
