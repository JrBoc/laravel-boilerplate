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
                            <div><strong>Edit User</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <x-form.group label="Name" required :error="$errors->first('name')" class="mb-3">
                                <x-form.text name="name" placeholder="Name" value="{{ old('name', $user) }}"/>
                            </x-form.group>
                            <x-form.group label="Email" required :error="$errors->first('email')" class="mb-3">
                                <x-form.email name="email" placeholder="Email" value="{{ old('email', $user) }}"/>
                            </x-form.group>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Note:</strong> To update password enter fill up the fields below.
                                </div>
                                <div class="card-body">
                                    <x-form.group label="Password" :error="$errors->first('password')" class="mb-3">
                                        <x-form.password name="password" placeholder="Password" />
                                    </x-form.group>
                                    <x-form.group label="Password Confirmation" :error="$errors->first('password_confirmation')" class="mb-3">
                                        <x-form.password name="password_confirmation" placeholder="Password Confirmation" />
                                    </x-form.group>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
