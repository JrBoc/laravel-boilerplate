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
                            <div class="my-1"><strong>Edit</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <x-form.group class="row mb-3">
                                <strong class="col-sm-3 col-form-label">
                                    Name:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.text name="name" placeholder="Name" :error="$errors->first('name')" value="{{ old('name', $user) }}" />
                                    <x-form.error :error="$errors->first('name')" />
                                </div>
                            </x-form.group>
                            <x-form.group class="row mb-3" :error="$errors->first('email')">
                                <strong class="col-sm-3 col-form-label">
                                    Email:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.email name="email" :error="$errors->first('email')" placeholder="Email" value="{{ old('email', $user) }}" required />
                                    <x-form.error :error="$errors->first('email')" />
                                </div>
                            </x-form.group>
                            <x-form.group class="row" :error="$errors->first('role')">
                                <strong class="col-sm-3 col-form-label">
                                    Role:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.select name="role" :error="$errors->first('role')" required>
                                        <option value="">-- Select Role --</option>
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}" {{ old('role', $user->roles[0]?->id) === $id ? 'selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </x-form.select>
                                    <x-form.error :error="$errors->first('role')" />
                                </div>
                            </x-form.group>
                            <hr>
                            <x-form.group class="row">
                                <div class="offset-sm-3 col-sm-9">
                                    <div class="small mb-2">
                                        <strong>Note:</strong> To update password enter fill up the fields below.
                                    </div>
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Password:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.password name="password" :error="$errors->first('password')" placeholder="Password" />
                                    <x-form.error :error="$errors->first('password')" />
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Password Confirmation:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.password name="password_confirmation" :error="$errors->first('password_confirmation')" placeholder="Password Confirmation" />
                                    <x-form.error :error="$errors->first('password_confirmation')" />
                                </div>
                            </x-form.group>
                            <x-form.group class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                                </div>
                            </x-form.group>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
