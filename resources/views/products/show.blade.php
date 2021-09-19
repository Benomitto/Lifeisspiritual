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
	<title>Life Is Spiritual</title>

</head>
  <body>
    
	@include('layouts.navbar')            <!--end navbar-->
			
			
			<section class="bg-cencer bg-contain" style="background: url(/assets/img/hero-bg-3.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">{{$product->title}}</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<!--1-->
	<section id="about" class="ts-block mt-5 py-5" >
                <div class="container">
				<!--<h2 class="text-center">Our Books</h2>-->
                    <!--end ts-title-->
                    <div class="row">
				
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="ts-card__image ts-img-into-bg">
                                   <a href=""> <img class="card-img-top image-fluid" src="{{asset($product->image)}}" alt="{{$product->title}}"></a>
                                </div>
                                <!--end ts-card__image-->
                                <div class="card-body">
                                    <a href=""><h5 class="mb-3">{{$product->title}}</h5></a>
                                    
                                </div>
                                <!--end card-body-->
                                <div class="card-footer bg-white">
                                    <div class="ts-social-icons">
                                       
                                        <a href="">
											<i class="text-muted"><strike>Ksh.{{$product->price}}</strike></i>
                                            <span class="text-primary font-weight-bold">Ksh.{{$product->price}}</span>
                                        </a><br>
										@if($product->inStock>0)
									<span class="badge badge-primary p-3">Available</span>
								@else
									<span class="badge badge-primary p-3">Not Available</span>
									@endif
                                       
                                    </div>
                                    <!--end social-icons-->
                                </div>
                                <!--end card-footer-->
                            </div>
                            <!--end card-->
                        </div>
						<div class="col-md-4 ">
			<form action="{{route('add.cart',$product->slug)}}" method="post">
				@csrf
				<div class="form-group">
					<label for="qty" class="label-input">
						Quantity
					</label>
					<input type="number" name="qty" id="qty" value="1" max="{{$product->inStock}}" min="1" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block mb-5">
						Add To Cart
					</button>
					<h6 class="ts-opacity__50">{{($product->description)}}
									 .</h6>
					
				</div>
			</form>
		</div>
                    </div>
				<!--end row-->
                </div>
            </section>
			
			<!--Related Products-->
			
			<section class="py-2">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h4 class="text-center"><u class="">Related Products</u></h4>
							<hr>
							<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--Related Products-->
			
			 <footer class="footer-top" id="ts-footer">
            <section id="contact" class="ts-separate-bg-element" data-bg-image="assets/img/bg-hand-mobile.jpg" data-bg-image-opacity=".1" data-bg-color="#12264f">
                @include('layouts.footer')
            </section>
        </footer>

	
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
