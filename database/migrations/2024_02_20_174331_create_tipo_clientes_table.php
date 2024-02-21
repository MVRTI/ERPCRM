<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoClientesTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Descripción');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_clientes');
    }
}
