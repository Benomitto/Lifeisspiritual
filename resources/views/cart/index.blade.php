<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/css/nicepage.css" media="screen">
	<link rel="stylesheet" href="/css/Home.css" media="screen">
	<title>Life Is Spiritual</title>

</head>
  <body>
    
	@include('layouts.navbar') 
            <!--end navbar-->
			
			
			<section class="bg-cencer bg-contain" style="background: url(/assets/img/hero-bg-3.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">Checkout</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<!--1-->

<div class="container">
    <div class="row p-3">
        <div class="col-md-12 card p-3">
			<h5 class="text-center text-primary">
				<table class="table table-hover u-table-body">
					<thead>
						<tr style="height:121px;">
							<td>Image</td>
							<td>Title</td>
							<td>Qty</td>
							<td>Price</td>
							<td>Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($items as $item)
							<tr>
								<td>
									<img src="{{$item->associatedModel->image}}" alt="{{$item->name}}"
									 class="image-fluid rounded" width="100" height="150"
									>
								</td>
									<td>{{$item->name}}</td>
									<td>
									<form class="d-flex flex-row justify-content-center align-items-center" action="{{route('update.cart',$item->associatedModel->slug)}}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group mx-2">
					
					<input type="number" name="qty" id="qty" value="{{$item->quantity}}" max="{{$item->associatedModel->inStock}}" min="1" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-plus">Update</i>
					</button>
					
				</div>
			</form>
			</td>
									<td>{{$item->price}}</td>
									<td>{{$item->price * $item->quantity}}</td>
									
									<td>
										<form action="{{route('delete.cart',$item->associatedModel->slug)}}" method="post">
				@csrf
				@method('DELETE')
				
				<div class="form-group">
					<button type="submit" class="btn btn-danger btn-sm">
						<i class="fa fa-trash">Delete</i>
					</button>
					
				</div>
			</form>
									</td>
							</tr>
						@endforeach
						<tr class="text-dark font-weight-bold">
							<td colspan="3" class="border border-info">
								Total:
							</td>
							<td colspan="3" class="border border-info">
								{{\Cart::getSubtotal() }} Ksh
							</td>
						</tr>
					</tbody>
				</table>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<div class="cart-checkout-btn text-center">
								@if(Auth::user())
									<a href="{{url('checkout')}}" class="btn btn-primary">Proceed To CheckOut</a>
								@else
									<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#LoginModal">Proceed To CheckOut</a>
									<!-- Modal -->
										<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-body">
												         <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                      		  <div class="modal-footer">
												<button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
												 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
											  </div>
                    </form>
											  </div>
									
											</div>
										  </div>
										</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</h5>
        </div>
    </div>	
</div>

    
    
    
    

	
	<script src="/assets/js/custom.hero.js"></script>
	<script src="/assets/js/jquery-3.3.1.min.js"></script>
	<script src="/assets/js/popper.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script>
	<script src="/assets/js/isInViewport.jquery.js"></script>
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets/js/owl.carousel.min.js"></script>
	<script src="/assets/js/scrolla.jquery.min.js"></script>
	<script src="/assets/js/jquery.validate.min.js"></script>
	<script src="/assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
    <script src="/assets/js/custom.js"></script>
  </body>
</html>
