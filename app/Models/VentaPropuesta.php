<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPropuesta extends Model
{
    use HasFactory;

    protected $primaryKey = 'PropuestaID';
    protected $fillable = ['ClienteID', 'FechaCreacion', 'Estado', 'Detalles'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ClienteID');
    }

    public function detallesVenta()
    {
        return $this->hasMany(VentaDetalles::class, 'PropuestaID');
    }
}
