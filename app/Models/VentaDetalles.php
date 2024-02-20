<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalles extends Model
{
    use HasFactory;

    protected $primaryKey = 'DetalleVentaID';
    protected $fillable = ['PropuestaID', 'ProductoServicioID', 'CantidadVendida', 'PrecioUnitario'];

    public function propuesta()
    {
        return $this->belongsTo(VentaPropuesta::class, 'PropuestaID');
    }

    public function productoServicio()
    {
        return $this->belongsTo(ProductoServicio::class, 'ProductoServicioID');
    }
}
