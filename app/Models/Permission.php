<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public static function getRoutePermissions()
    {
        $routes = collect(Route::getRoutes()->getRoutesByName());

        $excludedRoutes = [
            'ignition.healthCheck',
            'ignition.executeSolution',
            'ignition.updateConfig',
            'login',
            'logout',
        ];

        return array_undot($routes->except($excludedRoutes)->all());
    }
}
