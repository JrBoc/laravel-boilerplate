@extends('layouts.app')

@php
    /** @var $roles<array,\App\Models\Role> */
@endphp

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><strong>Roles</strong></div>
                            <div>
                                <a href="{{ route('roles.create') }}" class="btn btn-outline-primary">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr class="align-items-center">
                                    <td class="text-end align-middle">
                                        {{ $role->id }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $role->name }}
                                    </td>
                                    <td style="width: 1%" class="text-nowrap align-middle">
                                        <a href="{{ route('roles.show', $role) }}" class="btn btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No Roles</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
