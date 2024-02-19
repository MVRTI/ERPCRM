<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposDeClienteTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_de_cliente', function (Blueprint $table) {
            $table->id('TipoClienteID');
            $table->string('Descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_de_cliente');
    }
}
