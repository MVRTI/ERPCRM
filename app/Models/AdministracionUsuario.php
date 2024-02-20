<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministracionUsuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'UsuarioID';
    protected $fillable = ['NombreUsuario', 'Contraseña'];
}
