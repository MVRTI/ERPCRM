<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('Cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposClientes = TipoCliente::all();
        return view('Cliente.create', compact('tiposClientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:clientes,Email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
    
        $cliente = new Cliente();
        $cliente->Nombre = $request->nombre;
        $cliente->Apellido = $request->apellido;
        $cliente->Email = $request->email;
        $cliente->Teléfono = $request->telefono;
        $cliente->Dirección = $request->direccion;

        $cliente->save();
    
        return redirect()->route('clientes.dashboard')->with('success', 'Cliente creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('Cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $tiposClientes = TipoCliente::all();
        return view('Cliente.edit', compact('cliente', 'tiposClientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $cliente->update([
            'Nombre' => $request->nombre,
            'Apellido' => $request->apellido,
            'Email' => $request->email,
            'Teléfono' => $request->telefono,
            'Dirección' => $request->direccion,
        ]);

        return redirect()->route('Cliente.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('Cliente.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
