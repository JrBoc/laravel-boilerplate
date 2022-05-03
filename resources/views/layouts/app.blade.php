@extends('layouts.base')

@section('body')
    <x-sidebar/>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <x-header/>
        <div class="body flex-grow-1 px-3">
            @yield('content')
        </div>
        <x-footer/>
    </div>
@endsection
