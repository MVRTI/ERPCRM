<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('productos_servicios', function (Blueprint $table) {
            $table->id('ProductoServicioID');
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->decimal('Precio', 8, 2);
            $table->integer('Stock');
            $table->dateTime('FechaEntrada');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_servicios');
    }
}

