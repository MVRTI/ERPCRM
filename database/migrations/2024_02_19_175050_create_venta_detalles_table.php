<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasDetallesTable extends Migration
{
    public function up()
    {
        Schema::create('ventas_detalles', function (Blueprint $table) {
            $table->id('DetalleVentaID');
            $table->unsignedBigInteger('PropuestaID');
            $table->foreign('PropuestaID')->references('PropuestaID')->on('venta_propuestas');
            $table->unsignedBigInteger('ProductoServicioID');
            $table->foreign('ProductoServicioID')->references('ProductoServicioID')->on('productos_servicios');
            $table->integer('CantidadVendida');
            $table->decimal('PrecioUnitario', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas_detalles');
    }
}
