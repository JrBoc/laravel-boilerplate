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
                            <div><strong>Create User</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-form.group label="Name" required :error="$errors->first('name')" class="mb-3">
                                <x-form.text name="name" placeholder="Name" />
                            </x-form.group>
                            <x-form.group label="Email" required :error="$errors->first('email')" class="mb-3">
                                <x-form.email name="email" placeholder="Email" />
                            </x-form.group>
                            <x-form.group label="Password" required :error="$errors->first('password')" class="mb-3">
                                <x-form.password name="password" placeholder="Password" />
                            </x-form.group>
                            <x-form.group label="Password Confirmation" required :error="$errors->first('password_confirmation')" class="mb-3">
                                <x-form.password name="password_confirmation" placeholder="Password Confirmation" />
                            </x-form.group>
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
