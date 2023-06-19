@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Welcome to the Home Page!</h1>
        <p>Register or login to access the dashboard.</p>

        <div class="mb-3">
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>

        <div class="mb-3">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
    </div>
@endsection
