<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPropuesta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_cliente', 'detalle_proyecto', 'servicios_ofrecidos', 'precio', 'plazo'];
}
