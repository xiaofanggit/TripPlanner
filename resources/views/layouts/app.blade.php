<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>        
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-fixedtop navbar-default padding-bottom-20">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url(App::getLocale().'/') }}">
                        {{ trans('messages.title') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url(App::getLocale().'/login') }}">{{trans('messages.login')}}</a></li>
                            <li><a href="{{ url(App::getLocale().'/register') }}">{{trans('messages.register')}}</a></li>
                        @else                        
                            <li><a href='{{ url(App::getLocale().'/items')}}'>Items</a></li>
                            <li><a href='{{ url(App::getLocale().'/needPurchasedList')}}'>Need Purchased Items</a></li>
                            <li><a href='{{ url(App::getLocale().'/luggages')}}'>Luggages</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url(App::getLocale().'/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url(App::getLocale().'/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="{{ url(App::getLocale().'/')}}">{{trans('messages.lang')}}</a><li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <div class="list-area">
            @yield('content')
        <div>        
        </div>
        <footer class='footer text-center'>
            &copy; {{trans('messages.copyright')}} <?php echo date("Y"); ?> . {{trans('messages.reserved')}}.
        </footer>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script>
        jQuery(document).ready(function() {            
            @yield('postJquery');
            setTimeout(function() {
                $('.alert-success').fadeOut('fast');
            }, 2000);
        });
    </script>
    <script src="/js/app.js"></script>
</body>
</html>
