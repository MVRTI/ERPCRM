<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'ClienteID';
    protected $fillable = ['Nombre', 'Apellido', 'Email', 'Teléfono', 'Dirección', 'TipoClienteID'];

    public function tipoCliente()
    {
        return $this->belongsTo(TipoCliente::class, 'TipoClienteID');
    }

    public function propuestas()
    {
        return $this->hasMany(VentaPropuesta::class, 'ClienteID');
    }
}
