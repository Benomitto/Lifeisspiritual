<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
	<script src="/assets/js/custom.hero.js"></script>
	<script src="/assets/js/jquery-3.3.1.min.js"></script>
	<script src="/assets/js/popper.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>

	<script src="/assets/js/isInViewport.jquery.js"></script>
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets/js/owl.carousel.min.js"></script>
	<script src="/assets/js/scrolla.jquery.min.js"></script>
	<script src="/assets/js/jquery.validate.min.js"></script>
	<script src="/assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
    <script src="/assets/js/custom.js"></script>
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #141a3a;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="assets/img/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav ml-auto">
							<a class="nav-item nav-link {{'/' == request()->path() ? 'active' : ''}} ts-scroll" href="/">Home </a>
							<a class="nav-item nav-link {{'about' == request()->path() ? 'active' : ''}} ts-scroll" href="about">About Us</a>
                            <a class="nav-item nav-link {{'ourbooks' == request()->path() ? 'active' : ''}} ts-scroll" href="ourbooks">Our Books</a>
                            <a class="nav-item nav-link {{'videos' == request()->path() ? 'active' : ''}} ts-scroll" href="videos">Videos</a>
                            <a class="nav-item nav-link {{'gallery' == request()->path() ? 'active' : ''}} ts-scroll" href="gallery">Gallery</a>
                            <a class="nav-item nav-link {{'blog' == request()->path() ? 'active' : ''}} ts-scroll" href="blog">Blog</a>
                            <a class="nav-item nav-link {{'contactus' == request()->path() ? 'active' : ''}} ts-scroll mr-2" href="contactus">Contact Us</a>
                              @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{'login' == request()->path() ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{'register' == request()->path() ? 'active' : ''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
										
                                    </a>
									

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
						<a class="nav-item nav-link ts-scroll mr-2" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart"></i></a>
                    </ul>
                </div>
            </div>
        </nav>
                    
        <div class="row py-5">
				<div class="col-md-8 mx-auto py-3">
					@include('layouts.alert')
				</div>
			</div>

        <main class="py-5">
           <div class="mt-5">  @yield('content')</div>
        </main>
    </div>
</body>
</html>
