<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InitialSeed extends Migration
{
    public function up()
    {
        $user = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.test',
            'password' => 'password',
        ]);

        $role = \App\Models\Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $user->assignRole($role);
    }
}
