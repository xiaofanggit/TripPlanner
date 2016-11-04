<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trip Planner</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Welcome to your Trip Planner
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">List items</a>
                    <a href="https://laracasts.com">Need borrows items</a>
                    <a href="https://laravel-news.com">Luggages</a>
                    <a href="https://forge.laravel.com">About us</a>
                    <a href="https://github.com/laravel/laravel">Contact us</a>
                </div>
            </div>
        </div>
    </body>
</html>
