@extends('main');

@section('title', 'Log in')

@section('content')
    <div class="login-container">
        <label for="email">Email: </label><input type="text" id="email"><br>
        <label for="password">Password: </label><input type="password" id="password"><br>
        <button>Login</button>
    </div>
@endsection
