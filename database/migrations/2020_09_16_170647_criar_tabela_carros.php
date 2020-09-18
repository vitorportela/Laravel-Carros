<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaCarros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros',function (Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            #$table->string('ano');
            #$table->string('combustivel');
            #$table->string('portas');
            #$table->string('quilometragem');
            #$table->string('cambio');
            #$table->string('cor');
            #$table->string('preço');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carros');
    }
}
