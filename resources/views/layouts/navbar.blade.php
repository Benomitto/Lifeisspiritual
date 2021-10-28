            <nav class="navbar navbar-expand-md navbar-dark fixed-top" data-bg-color="#141a3a">
                <div class="container">
                    <a class="navbar-brand" href="#page-top">
                        <img src="/assets/img/logo.png" alt="">
                    </a>
                    <!--end navbar-brand-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--end navbar-toggler-->
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link {{'/' == request()->path() ? 'active' : ''}} ts-scroll" href="/">Home </a>
							<a class="nav-item nav-link {{'about' == request()->path() ? 'active' : ''}} ts-scroll" href="/about">About Us</a>
                            <a class="nav-item nav-link {{'ourbooks' == request()->path() ? 'active' : ''}} ts-scroll" href="/ourbooks">Our Books</a>
                            <a class="nav-item nav-link {{'videos' == request()->path() ? 'active' : ''}} ts-scroll" href="/videos">Videos</a>
                            <a class="nav-item nav-link {{'gallery' == request()->path() ? 'active' : ''}} ts-scroll" href="/gallery">Gallery</a>
                            <a class="nav-item nav-link {{'blog' == request()->path() ? 'active' : ''}} ts-scroll" href="/blog">Blog</a>
                            <a class="nav-item nav-link {{'contactus' == request()->path() ? 'active' : ''}} ts-scroll mr-2" href="/contactus">Contact Us</a>
                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{'login' == request()->path() ? 'active' : ''}}" href="#" data-toggle="modal" data-target="#LoginModal">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{'register' == request()->path() ? 'active' : ''}}" href="#" data-toggle="modal" data-target="#RegisterModal">{{ __('Register') }}</a>
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
							<a class="nav-item nav-link {{'cart' == request()->path() ? 'active' : ''}} ts-scroll mr-2" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart">{{\Cart::getContent()->count()}}</i></a>
                        </div>
                        <!--end navbar-nav-->
                    </div>
                    <!--end collapse-->
                </div>
                <!--end container-->
            </nav>
			
			<!--Modal Start-->
					<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-lg">
											<div class="modal-content">
											  <div class="modal-body">
												         <!--Login Start-->
														 
																<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-dark">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-dark text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-dark text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-dark" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
																
<!--Login End-->
</div>
									
</div>
</div>
</div>
<!--Modal End-->
			
			
			<!--Register Modal Start-->
						<div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-lg">
											<div class="modal-content">
											  <div class="modal-body">
												         <!--Register Start-->
														 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-dark">{{ __('Register') }}</div>
				@include('layouts.alert')
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-dark text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-dark text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<!--Phone-->
						
						<!--Phone-->

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-dark text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-dark text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
																
<!--Register End-->
</div>
									
</div>
</div>
</div>
			<!--Register Modal End-->