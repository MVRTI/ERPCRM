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
            $table->string('Teléfono');
            $table->string('Dirección');
            $table->foreignId('TipoClienteID')->constrained('tipo_clientes', 'TipoClienteID');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
