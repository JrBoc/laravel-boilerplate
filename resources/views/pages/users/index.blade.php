@extends('layouts.app')

@php
    /** @var $users<array,\App\Models\User> */
@endphp

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><strong>Users</strong></div>
                            <div>
                                <a href="{{ route('users.create') }}" class="btn btn-outline-primary">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr class="align-items-center">
                                    <td class="text-end align-middle">
                                        {{ $user->id }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $user->name }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $user->email }}
                                    </td>
                                    <td style="width: 1%" class="text-nowrap align-middle">
                                        <a href="{{ route('users.show', $user) }}" class="btn btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Users</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
