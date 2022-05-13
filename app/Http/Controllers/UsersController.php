<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        set_breadcrumbs(pageName: 'Users');

        return view('pages.users.index', [
            'users' => User::query()->paginate(10),
        ]);
    }

    public function create()
    {
        set_breadcrumbs([
            route('users.index') => 'Users',
        ], 'Create User');

        return view('pages.users.create');
    }

    public function store(StoreRequest $request)
    {
        User::create($request->safe([
            'name',
            'email',
            'password',
        ]));
    }
}
