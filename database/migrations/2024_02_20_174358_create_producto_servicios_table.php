<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('producto_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->text('Descripción');
            $table->decimal('Precio', 8, 2);
            $table->integer('Stock');
            $table->dateTime('FechaEntrada');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('producto_servicios');
    }
}
