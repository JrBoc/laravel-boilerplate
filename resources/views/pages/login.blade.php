@extends('layouts.base')

@section('body')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row shadow">
                        <div class="card border-0 col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <x-form.group label="Email" class="mb-3" :error="$errors->first('email')" :required="true">
                                        <x-form.email name="email" placeholder="Email" value="{{ old('email') }}" required />
                                    </x-form.group>
                                    <x-form.group label="Password" class="mb-4" :error="$errors->first('password')" :required="true">
                                        <x-form.password name="password" placeholder="Password" />
                                    </x-form.group>
                                    <x-form.group>
                                        <x-form.checkbox class="mb-3" name="remember_me" :error="$errors->first('remember_me')">
                                            Remember Me
                                        </x-form.checkbox>
                                    </x-form.group>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-end" style="display: none">
                                            <a class="btn btn-link px-0" href="#">Forgot password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card border-0 col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center d-flex align-items-center justify-content-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <a href="#" class="btn btn-outline-light mt-3">Register Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-4 mx-0 px-0">
                    <x-footer />
                </div>
            </div>
        </div>
    </div>
@endsection
