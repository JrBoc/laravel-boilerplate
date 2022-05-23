<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    protected array $breadcrumbs = [];

    public function __construct()
    {
        $this->breadcrumbs = [
            route('users.index') => 'Users',
        ];
    }

    public function index()
    {
        set_breadcrumbs(pageName: 'Users');

        return view('pages.users.index', [
            'users' => User::query()->with('roles')->paginate(10),
        ]);
    }

    public function create()
    {
        set_breadcrumbs($this->breadcrumbs, 'Create');

        return view('pages.users.create', [
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $user = User::create($request->safe([
            'name',
            'email',
            'password',
        ]));

        $user->syncRoles($request->safe(['role'])['role']);

        return back()->with([
            'success' => 'User successfully created.',
        ]);
    }

    public function show(User $user)
    {
        set_breadcrumbs($this->breadcrumbs, $user->id);

        return view('pages.users.show', [
            'user' => $user->load('roles'),
        ]);
    }

    public function edit(User $user)
    {
        set_breadcrumbs($this->breadcrumbs + [
                route('users.show', $user->id) => $user->id,
            ], 'Edit');

        return view('pages.users.edit', [
            'user' => $user->load('roles'),
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->safe([
            'name',
            'email',
        ]));

        if (! empty($request->input('password'))) {
            $user->update($request->safe([
                'password',
            ]));
        }

        $user->syncRoles($request->safe(['role'])['role']);

        return back()->with([
            'success' => 'User successfully updated.',
        ]);
    }

    public function destroy(User $user)
    {
        $user->deleteOrFail();

        return to_route('users.index')->with([
            'success' => 'User successfully deleted.',
        ]);
    }
}
