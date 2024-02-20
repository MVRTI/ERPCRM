<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductoServicioID';
    protected $fillable = ['Nombre', 'Descripción', 'Precio', 'Stock', 'FechaEntrada'];

    public function detallesVentas()
    {
        return $this->hasMany(VentaDetalles::class, 'ProductoServicioID');
    }
}
