<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministracionUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('administracion_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('NombreUsuario');
            $table->string('Contraseña');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administracion_usuarios');
    }
}
