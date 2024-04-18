<?php

namespace App\Http\Controllers;

use App\Models\ProductoServicio;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $productos = ProductoServicio::all();
        $ventas = Venta::orderBy('created_at', 'desc')->get();

        $ventasPendientes = Venta::where('estado', 'Pendiente')->get();
        $ventasAceptadas = Venta::where('estado', 'Aceptada')->get();
        $ventasRechazadas = Venta::where('estado', 'Rechazada')->get();

        return view('venta.index', [
            'ventasPendientes' => $ventasPendientes,
            'ventas' => $ventas,
            'ventasAceptadas' => $ventasAceptadas,
            'ventasRechazadas' => $ventasRechazadas,
        ]);
    }
    
    
    public function create()
    {
        $productos = ProductoServicio::all();
        return view('venta.create', ['productos' => $productos]);
    }
    

    public function store(Request $request)
{
    $data = $request->validate([
        'nombre' => 'required',
        'detalles' => 'required',
        'servicios_ofrecidos' => 'required',
        'precio' => 'required|numeric',
        'plazo' => 'required',
        'estado' => 'required',
        'productos' => 'required|array', // Verifica que los productos sean un array
    ]);

    // Crea una instancia de la venta
    $venta = new Venta([
        'nombre' => $data['nombre'],
        'detalles' => $data['detalles'],
        'servicios_ofrecidos' => $data['servicios_ofrecidos'],
        'precio' => $data['precio'],
        'plazo' => $data['plazo'],
        'estado' => $data['estado'],
    ]);

    // Guarda la venta para obtener un ID
    $venta->save();

    // Adjunta los productos a la venta con la cantidad seleccionada
    foreach ($data['productos'] as $producto_id => $cantidad) {
        if ($cantidad > 0) {
            $producto = ProductoServicio::find($producto_id);
    
            if ($producto) {
                // Verificar si la cantidad a restar es menor o igual al stock disponible
                if ($cantidad <= $producto->Stock) {
                    $producto->Stock -= $cantidad; // Restar la cantidad del stock
                    $producto->save(); // Guardar el producto con el nuevo stock
    
                    // Asociar el producto a la venta
                    $venta->productos()->attach($producto->id, ['cantidad' => $cantidad]);
                } else {
                    // Si la cantidad es mayor que el stock disponible
                    return redirect()->back()->with('error', 'La cantidad seleccionada es mayor que el stock disponible');
                }
            } else {
                // Si no se encuentra el producto
                return redirect()->back()->with('error', 'Producto no encontrado');
            }
        } else {
            // Si la cantidad es 0 o negativa
            return redirect()->back()->with('error', 'No hay stock disponible de este producto');
        
    
        }
    }

    return redirect()->route('venta.index')->with('success', 'Venta creada exitosamente');
}

    

    public function edit(Venta $venta){
            return view('venta.edit', ['venta'=> $venta]);
    }

    public function update(Venta $venta, Request $request){
        $data = $request->validate([
            
            'nombre'=> 'required',
            'detalles'=> 'required',
            'servicios_ofrecidos'=> 'required',
            'precio'=> 'required|decimal:0,4',
            'plazo'=> 'required',
            'estado'=> 'required',

        ]);

        $venta->update($data);
        return redirect(route('venta.index'))->with('success', 'Propuesta editada con exito');
}

public function delete(Venta $venta){
    $venta->delete();
    return redirect(route('venta.index'))->with('success', 'Propuesta eliminada con exito');


}

public function aceptar(Venta $venta){

    $venta->estado = 'Aceptada';
    $venta->save();
    return redirect()->route('venta.index')->with('success', 'propuesta aceptada, los cambios no se pueden deshacer');

}
public function rechazar(Venta $venta){
    $venta->estado = 'Rechazada';
    $venta->save();
    return redirect()->route('venta.index')->with('success', 'propuesta rechazada, los cambios no se pueden deshacer');

}



}