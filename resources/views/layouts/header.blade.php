<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Template {{$Settings->site_name ?? ""}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset("css/animate.css")}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset("css/icomoon.css")}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset("css/magnific-popup.css")}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset("css/flexslider.css")}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
	<link rel="stylesheet" href="{{asset("css/owl.theme.default.min.css")}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset("css/style.css")}}">

	<!-- Modernizr JS -->
	<script src="{{asset("js/modernizr-2.6.2.min.js")}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
        <div class="colorlib-loader"></div>

        <div id="page">
            <nav class="colorlib-nav" role="navigation">
                <div class="top-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-2">
                                <a class="nav-link " href="{{ route('interface.index') }}" >
                                    <div id="colorlib-logo"><img src="{{ asset('images/laravel-512.png') }}" height="50" width="50" style="float:left"/>
                                    <p  class="brand-home">{{ __('Blog') }} </p></div>
                                </a>
                            </div>
                            <div class="col-xs-10 text-right menu-1">
                                <ul>
                                     <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>

                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
