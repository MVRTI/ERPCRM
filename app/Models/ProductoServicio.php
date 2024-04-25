<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre', 'Descripción', 'Precio', 'Stock', 'FechaEntrada'];

    public function ventas(){
        return $this->belongsToMany(Venta::class)->withPivot('cantidad');
    }
    


}