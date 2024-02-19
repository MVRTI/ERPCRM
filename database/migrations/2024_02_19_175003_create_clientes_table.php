<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ClienteID');
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->unsignedBigInteger('TipoClienteID');
            $table->foreign('TipoClienteID')->references('TipoClienteID')->on('tipos_de_cliente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
