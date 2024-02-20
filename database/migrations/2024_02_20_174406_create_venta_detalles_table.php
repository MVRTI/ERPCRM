<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaDetallesTable extends Migration
{
    public function up()
    {
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->id('DetalleVentaID');
            $table->foreignId('PropuestaID')->constrained('venta_propuestas', 'PropuestaID');
            $table->foreignId('ProductoServicioID')->constrained('producto_servicios', 'ProductoServicioID');
            $table->integer('CantidadVendida');
            $table->decimal('PrecioUnitario', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta_detalles');
    }
}
