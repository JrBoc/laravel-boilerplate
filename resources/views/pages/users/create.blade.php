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
                            <div class="my-1"><strong>Create</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Name:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.text name="name" :error="$errors->first('name')" placeholder="Name" required />
                                    <x-form.error :error="$errors->first('name')"></x-form.error>
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Email:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.email name="email" :error="$errors->first('email')" placeholder="Email" required />
                                    <x-form.error :error="$errors->first('email')"></x-form.error>
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Role:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.select name="role" required>
                                        <option value="">-- Select Role --</option>
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}" {{ old('role') === $id ? 'selected' : ''}}>{{ $role }}</option>
                                        @endforeach
                                    </x-form.select>
                                    <x-form.error :error="$errors->first('role')"></x-form.error>
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Password:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.password name="password" :error="$errors->first('password')" placeholder="Password" required />
                                    <x-form.error :error="$errors->first('password')"></x-form.error>
                                </div>
                            </x-form.group>
                            <x-form.group class="mb-3 row">
                                <strong class="col-sm-3 col-form-label">
                                    Password Confirmation:
                                    <x-form.required />
                                </strong>
                                <div class="col-sm-9">
                                    <x-form.password name="password_confirmation" :error="$errors->first('password_confirmation')" placeholder="Password Confirmation" required />
                                    <x-form.error :error="$errors->first('password_confirmation')"></x-form.error>
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
