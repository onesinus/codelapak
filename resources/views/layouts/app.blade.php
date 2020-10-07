<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Codelapak') }}</title>
    <link rel='shortcut icon' type='image/x-icon' href='{{asset("public/favicon.ico")}}' />

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jquery-confirm.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="{{ asset('public/js/jQuery-1.9.1.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/js/jquery-confirm.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({type: "GET",url: '{{url("home/getTotalBelanja")}}'}).done(function( total_belanja ) {
            $('.total_belanja').text(' '+total_belanja);
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139145602-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-139145602-1');
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Codelapak') }}
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
                            <li><a href="{{ url('home') }}"><i class="fa fa-folder"> Apps</i></a></li>                            
                            <li><a href="{{ url('trainings') }}"><i class="fa fa-bars"> Trainings</i></a></li>                            
                            <li><a href="{{ url('ebooks') }}"><i class="fa fa-book"> Ebooks</i></a></li>                            
                        @guest
                            <li><a href="{{ url('login') }}"><i class="fa fa-user">[Login|Register|Forgot Password]</i></a></li>
                        @else <!-- ini halaman buat administrator -->
                            @if(Auth::user()->name == "Administrator")
                                <li><a href="{{ url('products') }}"><i class="fa fa-folder"> Apps</i></a></li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-book"> Ebooks</i></a></li>
                                <li><a href="{{ url('users') }}"><i class="fa fa-user-circle"> Users</i></a></li>
                            @else
                                <li><a href="{{ url('cart_history') }}"><i class="fa fa-history"> Cart History</i></a></li>
                                <li><a href="{{ url('cart_detail') }}"><i class="fa fa-shopping-cart fa-lg badge total_belanja"> </i></a></li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <i class="fa fa-cog">{{ Auth::user()->name }}</i> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out">Logout</i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>