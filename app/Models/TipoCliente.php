<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'TipoClienteID';
    protected $fillable = ['Descripción'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'TipoClienteID');
    }
}
