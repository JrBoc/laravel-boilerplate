@extends('layouts.app')

@php
    /** @var $user \App\Models\User */
@endphp

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><strong>Show User</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-form.group label="Name" :error="$errors->first('name')" class="mb-3">
                            <x-form.text name="name" placeholder="Name" value="{{ old('name', $user) }}" disabled />
                        </x-form.group>
                        <x-form.group label="Email" :error="$errors->first('email')" class="mb-3">
                            <x-form.email name="email" placeholder="Email" value="{{ old('email', $user) }}" disabled />
                        </x-form.group>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary">Edit User</a>
                            <form action="{{ route('users.destroy', $user) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
