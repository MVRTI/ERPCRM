<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('venta.index', ['ventas' => $ventas]);
    }
    

    public function create(){
        return view ('venta.create');


    }

    public function store(Request $request){
        $data = $request->validate([
            
            'nombre'=> 'required',
            'detalles'=> 'required',
            'servicios_ofrecidos'=> 'required',
            'precio'=> 'required|decimal:0,4',
            'plazo'=> 'required',
            'estado'=> 'required',

        ]);

        $newVenta = Venta::create($data);

        return redirect(Route('venta.index'));



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





}