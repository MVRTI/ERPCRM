<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('confpermisos', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('userinfo', compact('user'));
    }

    public function create()
    {
        return view('añadiruser');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'role' => 'required|in:admin,user',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect('/usuarios')->with('success', 'Usuario agregado correctamente');
}

    public function update(Request $request, $id): RedirectResponse
    {
    $user = User::findOrFail($id); 

  
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,user',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect('/usuarios')->with('success', 'Los datos del usuario han sido actualizados correctamente');
    }

    public function deleteAccount($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        
        if ($user->delete()) {
            return redirect('/usuarios')->with('success', 'El usuario ha sido eliminado correctamente');
        } else {
            return redirect('/usuarios')->with('error', 'No se pudo eliminar el usuario');
        }
    }

}
