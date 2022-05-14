<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
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
            'users' => User::query()->paginate(10),
        ]);
    }

    public function store(StoreRequest $request)
    {
        User::create($request->safe([
            'name',
            'email',
            'password',
        ]));

        return back()->with([
            'success' => 'User successfully created.',
        ]);
    }

    public function create()
    {
        set_breadcrumbs($this->breadcrumbs, 'Create User');
        
        return view('pages.users.create');
    }

    public function show(User $user)
    {
        set_breadcrumbs($this->breadcrumbs, $user->id);

        return view('pages.users.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        set_breadcrumbs($this->breadcrumbs + [
                route('users.show', $user->id) => $user->id,
            ], 'Edit User');

        return view('pages.users.edit', [
            'user' => $user,
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
