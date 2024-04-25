<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GestorVentasPolicy
{
    use HandlesAuthorization;

    public function viewSales(User $user)
    {
        return $user->role === 'Administrador' || $user->role === 'Gestor de Ventas' || $user->role === 'Gestor de Productos';
    }

    public function gestorSale(User $user)
    {
        return $user->role === 'Administrador' || $user->role === 'Gestor de Ventas';
    }
}

