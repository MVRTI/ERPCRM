<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GestorProductosPolicy
{
    use HandlesAuthorization;

    public function viewProducts(User $user)
    {
        return $user->role === 'Administrador' || $user->role === 'Gestor de Productos' || $user->role === 'Gestor de Ventas';
    }
}
