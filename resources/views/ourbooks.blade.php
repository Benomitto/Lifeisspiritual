<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<title>Life Is Spiritual</title>

</head>
  <body>
    
	@include('layouts.navbar')            <!--end navbar-->
			
			
			<section class="bg-cencer bg-cover" style="background: url(assets/img/books.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">Our Books</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
	                           <section id="about" class="ts-block" >
                   <div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row">
			@foreach($products as $product)
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="{{route("products.show",$product->slug)}}">
                        <div class="card-flyer"  >
                            <div class="text-box">
                                <div class="image-box ">
                                    <img src="{{asset($product->image)}}" alt="{{$product->title}}" class="rounded mx-auto d-block" />
                                </div>
                                <div class="text-container">
                                    <h6>{{$product->title}}</h6>
                                    <p style="max-width: 18rem;"class="ts-opacity__50">{{Str::limit($product->description,100)}}</p>
                                </div>
								<div class="card-footer">
											<i class="text-muted"><strike>Ksh.{{$product->old_price}}</strike></i>
                                            <span class="text-primary font-weight-bold">Ksh.{{$product->price}}</span><br>
											<span class="text-primary font-weight-bold">View</span>
								</div>
                            </div>
                        </div>
                    </a>
                </div>
				@endforeach
            </div>
        </div>
    </div>
				
				<!--New-->
			
				<!--New End-->
            </section>			
			 <footer class="footer-top" id="ts-footer">
            <section id="contact" class="ts-separate-bg-element" data-bg-image="assets/img/bg-hand-mobile.jpg" data-bg-image-opacity=".1" data-bg-color="#12264f">
                @include('layouts.footer')
            </section>
        </footer>
	
	<script src="assets/js/custom.hero.js"></script>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script>
	<script src="assets/js/isInViewport.jquery.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/scrolla.jquery.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
