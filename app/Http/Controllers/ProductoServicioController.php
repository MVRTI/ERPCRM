<?php

namespace App\Http\Controllers;

use App\Models\ProductoServicio;
use Illuminate\Http\Request;

class ProductoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = ProductoServicio::all();
        return view('productoservicioshow', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'required|string',
            'Precio' => 'required|numeric',
            'Stock' => 'required|integer',
            'FechaEntrada' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Create a new ProductoServicio instance
        $productoServicio = new ProductoServicio([
            'Nombre' => $validatedData['Nombre'],
            'Descripción' => $validatedData['Descripcion'],
            'Precio' => $validatedData['Precio'],
            'Stock' => $validatedData['Stock'],
            'FechaEntrada' => $validatedData['FechaEntrada'],
        ]);

        // Save the ProductoServicio
        $productoServicio->save();

        // Redirect back with success message
        return redirect()->route('producto.index')->with('success', 'ProductoServicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductoServicio $producto)
{
    return view('productodetail', compact('producto'));
}

public function edit($id)
{
    // Find the product
    $producto = ProductoServicio::findOrFail($id);

    // Return the edit view with the product data
    return view('productodetail', compact('producto'));
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'Nombre' => 'required|string|max:255',
        'Descripcion' => 'required|string',
        'Precio' => 'required|numeric',
        'Stock' => 'required|integer',
        'FechaEntrada' => 'required|date_format:Y-m-d\TH:i',
    ]);

    // Find the product
    $producto = ProductoServicio::findOrFail($id);

    // Update the product with validated data
    $producto->update([
        'Nombre' => $validatedData['Nombre'],
        'Descripción' => $validatedData['Descripcion'],
        'Precio' => $validatedData['Precio'],
        'Stock' => $validatedData['Stock'],
        'FechaEntrada' => $validatedData['FechaEntrada'],
    ]);

    // Redirect back with success message
    return redirect()->route('producto.index')->with('success', 'ProductoServicio actualizado exitosamente.');
}


public function destroy($ProductoServicioID)
    {
        // Delete the product
        $producto = ProductoServicio::find($ProductoServicioID);

        $producto->delete();


        // Redirect back with success message
        return redirect()->route('producto.index')->with('success', 'ProductoServicio eliminado exitosamente.');
    }
}
