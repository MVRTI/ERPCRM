<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propuesta;

class PropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propuestas = Propuesta::all();
        return view('propuesta', compact('propuestas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('propuesta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre_cliente'=>'required',
        'detalle' => 'required',
        'servicios_ofrecidos' => 'required',
        'precio' => 'required|numeric',
        'plazo' => 'required',
    ]);

    $propuesta = new Propuesta();
    $propuesta->detalle_proyecto = $request->detalle_proyecto;
    $propuesta->servicios_ofrecidos = $request->servicios_ofrecidos;
    $propuesta->precio = $request->precio;
    $propuesta->plazo = $request->plazo;

    $propuesta->save();
}


    /**
     * Display the specified resource.
     */
    public function show(Propuesta $propuesta)
    {
        return view('propuesta.show', compact('propuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propuesta $propuesta)
    {
        return view('propuesta.edit', compact('propuesta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propuesta $propuesta)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'detalle_proyecto' => 'required',
            'servicios_ofrecidos' => 'required',
            'precio' => 'required|numeric',
            'plazo' => 'required',
        ]);

        $propuesta->update($request->all());

        return redirect()->route('propuesta.index')->with('success', 'Propuesta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propuesta $propuesta)
    {
        $propuesta->delete();
        return redirect()->route('propuesta.index')->with('success', 'Propuesta eliminada exitosamente.');
    }
}
