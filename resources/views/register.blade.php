@extends('main');

@section('title', 'Register')

@section('content')
    <div class="login-container">
        <label for="name">Name: </label><input type="text" id="name"><br>
        <label for="email">Email: </label><input type="text" id="email"><br>
        <label for="role">Role: </label><select name="" id="role">
            <option value="">role</option>
            <option value="role_id">DEV</option>
            <option value="role_id">QA</option>
            <option value="role_id">BA</option>
            <option value="role_id">PM</option>
        </select><br>
        <label for="password">Password: </label><input type="password" id="password"><br>
        <label for="password-confirm">Confirm password: </label><input type="password" id="password-confirm"><br>
        <button>Register</button>
    </div>
@endsection
