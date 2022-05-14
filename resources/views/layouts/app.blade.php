@extends('layouts.base')

@section('body')
    <x-sidebar />
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <x-header />
        <div class="body flex-grow-1 px-3">
            @if(session('success'))
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible shadow border-0" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
            @yield('content')
        </div>
        <x-footer />
    </div>
@endsection
