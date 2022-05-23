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
                            <div class="my-1"><strong>User</strong></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-form.group class="mb-3 row">
                            <strong class="col-sm-3 col-form-label">Name:</strong>
                            <div class="col-sm-9">
                                <x-form.text value="{{ $user->name }}" disabled />
                            </div>
                        </x-form.group>
                        <x-form.group class="mb-3 row">
                            <strong class="col-sm-3 col-form-label">Email:</strong>
                            <div class="col-sm-9">
                                <x-form.text value="{{ $user->email }}" disabled />
                            </div>
                        </x-form.group>
                        <x-form.group class="mb-3 row">
                            <strong class="col-sm-3 col-form-label">Role:</strong>
                            <div class="col-sm-9">
                                <x-form.text value="{{ $user->roles[0]?->name }}" disabled />
                            </div>
                        </x-form.group>
                        <x-form.group class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="post">
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
@endsection
