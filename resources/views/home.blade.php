@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="cards">
            <div class="card red">
                <a class="nav-link" href="{{ route('login') }}">
                    <h2 class="tip">{{ __('Login') }}</h2>
                </a>
            </div>
            <div class="card blue">
                <a class="nav-link" href="{{ route('register') }}">
                    <h2 class="tip">{{ __('Register') }}</h2>
                </a>
            </div>
        </div>
    </div>
@endsection
