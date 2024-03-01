<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Manager')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js']);
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="">Manager</a>
            </div>
        </header>

        <div class="content">
            @yield('content')
        </div>
    </body>
</html>
