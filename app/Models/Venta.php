<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','detalles','servicios_ofrecidos','precio','plazo','estado'
    ];

    public function productos()
    {
        return $this->belongsToMany(ProductoServicio::class, 'producto_venta')
                    ->withPivot('cantidad');
    }
    

    
}