<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagamento extends Migration
{
    public function up()
    {
        //
        Schema::create('pagamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('vencimento');
            $table->decimal('valor');
            $table->boolean('pago');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
