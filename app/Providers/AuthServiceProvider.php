<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\AdministradorPolicy;
use App\Policies\GestorProductosPolicy;
use App\Policies\GestorVentasPolicy;
use App\Policies\GestorClientesPolicy;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Venta' => 'App\Policies\GestorVentasPolicy',
        'App\Models\ProductoServicio' => 'App\Policies\GestorProductosPolicy',
        'App\Models\Cliente' => 'App\Policies\GestorClientesPolicy',
        User::class => [
            AdministradorPolicy::class,
            GestorProductosPolicy::class,
            GestorVentasPolicy::class,
            GestorClientesPolicy::class,
        ],
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
