<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\StoreRequest;
use App\Http\Requests\Roles\UpdateRequest;
use App\Models\Permission;
use App\Models\Role;

class RolesController extends Controller
{
    protected array $breadcrumbs = [];

    public function __construct()
    {
        $this->breadcrumbs = [
            route('roles.index') => 'Roles',
        ];
    }

    public function index()
    {
        set_breadcrumbs(pageName: 'Roles');

        return view('pages.roles.index', [
            'roles' => Role::query()->paginate(10),
        ]);
    }

    public function create()
    {
        set_breadcrumbs($this->breadcrumbs, 'Create');

        return view('pages.roles.create', [
            'routes' => Permission::getRoutePermissions(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->safe([
            'name',
            'permissions',
        ]);

        $roles = Role::create([
            'name' => $data['name'],
        ]);

        $roles->syncPermissions($data['permissions']);

        return back()->with([
            'success' => 'Role successfully created.',
        ]);
    }

    public function show(Role $role)
    {
        set_breadcrumbs($this->breadcrumbs, $role->id);

        return view('pages.roles.show', [
            'role' => $role->load('permissions'),
            'permissions' => $role->load('permissions')->permissions,
            'routes' => Permission::getRoutePermissions(),
        ]);
    }

    public function edit(Role $role)
    {
        set_breadcrumbs($this->breadcrumbs + [
                route('roles.show', $role->id) => $role->id,
            ], 'Edit');

        return view('pages.roles.edit', [
            'role' => $role,
            'permissions' => $role->load('permissions')->permissions,
            'routes' => Permission::getRoutePermissions(),
        ]);
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $role->update($request->safe([
            'name',
        ]));

        $role->syncPermissions($request->safe(['permissions'])['permissions']);

        return back()->with([
            'success' => 'Role successfully updated.',
        ]);
    }

    public function destroy(Role $role)
    {
        $role->deleteOrFail();

        return to_route('roles.index')->with([
            'success' => 'Role successfully deleted.',
        ]);
    }
}
