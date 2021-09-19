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
	<link rel="stylesheet" type="text/css" href="/css/contact.css">
	<title>Life Is Spiritual</title>

</head>
  <body>
    
	@include('layouts.navbar')            <!--end navbar-->
			
			
			<section class="bg-cencer bg-contain" style="background: url(assets/img/contact.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">Contact Us</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<!--1-->
	<div class="container">  
  <div class="container">

	<h1 class="py-3"></h1>
	@if(session('flash'))
		<p style="color:green">{{session('flash')}}</p>
	@endif
	<div class="wrapper">

		<!-- COMPANY INFORMATION -->
		<div class="company-info">
			<h3>Life Is Spiritual Ministries</h3>
			Feel free to write to us, we would love to hear from you:<br>
			<ul>
				<br>
				<li><i class="fa fa-phone"></i> Call +254717062098 or +254799733775</li>
				<li><i class="fa fa-envelope"></i> info@lifeisspiritual.org</li>
			</ul>
			God Bless You.
		</div>
		<!-- End .company-info -->
		@if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
		<!-- CONTACT FORM -->
		<div class="contact">
			<h3>Contact Us</h3>

			<form id="contact-form" action="{{ route('contactus') }}" method="POST">
			@csrf
				<p>
					<label>First Name</label>
					<input type="text" name="name" id="name" required placeholder="John">
					 @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
				</p>

				<p>
					<label>Last Name</label>
					<input type="text" name="name" id="name" required placeholder="Doe">
					 @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
				</p>
				
				<p class="full">
					<label>Phone Number</label>
					<input type="text" name="phone" id="phone" placeholder="+254 724 *** ***">
					@if ($errors->has('phone'))
        <div class="error">
            {{ $errors->first('phone') }}
        </div>
        @endif
				</p>
				
				<p class="full">
					<label>E-mail Address</label>
					<input type="email" name="email" id="email" required placeholder="email@example.com">
					@if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
				</p>

				

				<p class="full {{ $errors->has('message') ? 'error' : '' }}">
					<label>Message</label>
					<textarea name="message" rows="5" id="message"></textarea>
				</p>

				<p class="full ">
					<button type="submit">Submit</button>
				</p>

			</form>
			<!-- End #contact-form -->
		</div>
		<!-- End .contact -->

	</div>
	<!-- End .wrapper -->
</div>
<!-- End .container -->
</div>

	<!--4-->
	 <footer class="footer-top mt-5" id="ts-footer">
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
	<script src="js/contact.js"></script>
  </body>
</html>
