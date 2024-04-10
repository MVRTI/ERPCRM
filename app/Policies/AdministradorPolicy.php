<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministradorPolicy
{
    use HandlesAuthorization;

    public function viewUsers(User $user)
    {
        return $user->role === 'Administrador';
    }

}
