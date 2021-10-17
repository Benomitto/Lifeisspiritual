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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

	<title>Life Is Spiritual</title>

</head>
  <body>
    <style>.no-gutter > [class*='col-']{padding-right:0;padding-left:0;padding-top:0;}</style>
	@include('layouts.navbar')            <!--end navbar-->
			
			
			<section class="bg-cencer bg-contain" style="background: url(assets/img/gallery.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">Gallery</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
		            <section class="" id="sermons">
		            	
      <div class="container ">
		<!--Album Start-->
		@foreach ($galleries as $gallery)
		@php
		$images= explode("|",$gallery->image);
		$count = count($images);
		$image1 = 'images/gallery/'.$images[0];
		@endphp
		 <a class="item fancybox mb-5 mt-5" href="{{asset($image1)}}" data-fancybox="gallery1">
		  <div class="overlay-content"><img class="img-fluid rounded" src="{{asset($image1)}}" alt="...">
		  </div>
         <h2 class="text-center">{{$gallery->title}}</h2>
         <p class="text-center text-dark">{{$count}} Photos</p>
         <div class="description">
            <p class="text-center">Click to see more photos.</p>
         </div>
         @foreach ($images as $img)
		 <a class="item fancybox" href="{{asset('images/gallery/'.$img)}}" data-fancybox="gallery1"></a>
      @endforeach
		 
      </a>
      @endforeach
	  <!--Album End-->
      </div>

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
	<script src= "https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  </body>
</html>
