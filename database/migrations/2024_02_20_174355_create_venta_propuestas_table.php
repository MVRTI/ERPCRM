<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaPropuestasTable extends Migration
{
    public function up()
    {
        Schema::create('venta_propuestas', function (Blueprint $table) {
            $table->id('PropuestaID');
            $table->foreignId('ClienteID')->constrained('clientes', 'ClienteID');
            $table->dateTime('FechaCreacion');
            $table->enum('Estado', ['Aceptada', 'Pendiente', 'Rechazada']);
            $table->text('Detalles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_propuestas');
    }
}
