@extends('layouts.app')

@php
    /** @var $roles \App\Models\Role */
@endphp

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><strong>Role</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Name:
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.text value="{{ $role->name }}" disabled />
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Permissions:
                                </strong>
                                <div class="col-sm-9">
                                    <div class="card card-body">
                                        <div class="row">
                                            @foreach($routes as $route => $actions)
                                                <div class="col-md-3 col-12">
                                                    <label for="" class="form-label">
                                                        {{ \Illuminate\Support\Str::of($route)->replace('-', ' ')->headline() }}
                                                    </label>
                                                    @foreach($actions as $action)
                                                        @php
                                                            $name = \Illuminate\Support\Str::of($action->action['controller'])->explode('@')[1];
                                                        @endphp
                                                        <x-form.checkbox name="permissions[]" value="{{ $route . '.' . $name }}" :checked="$permissions->contains('name', $route. '.' . $name)" :disabled="true">
                                                            {{ $name }}
                                                        </x-form.checkbox>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <x-form.error :error="$errors->first('permissions')"></x-form.error>
                                </div>
                            </x-form.group>
                            <x-form.group class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('roles.destroy', $role) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </x-form.group>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
