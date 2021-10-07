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
			
			
			<section class="bg-cencer bg-contain" style="background: url(/assets/img/blog.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 ">
                <h4 class="text">{{$blog->title}}</h4>
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
				@if(Session::has('success'))
					<p class="text-success">{{session('success')}}</p>
				@endif
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="ts-card__image ts-img-into-bg">
                                   <a href=""> <img class="card-img-top image-fluid" src="{{'/images/blogs/'.$blog->image}}" alt="{{$blog->title}}"></a>
                                </div>
                                <!--end ts-card__image-->
                                <div class="card-body">
                                    <a href=""><h5 class="mb-3">{{$blog->date}}</h5></a>
                                    <a href=""><h5 class="mb-3">{{$blog->title}}</h5></a>
									<h5 class="mb-3 text-justify py-3">{{$blog->body}}</h5>
									<a href=""><button type="button" class="btn btn-outline-dark">Read More</button></a>
                                </div>
                                <!--end card-body-->
                               
                                <!--end card-footer-->
                            </div>
                            <!--end card-->
                        </div>
						<div class="col-lg-4">
								<div class="card mr-5">
				<ul class="list-group list-group-horizontal-md">
					<li class="list-group-item active">
						Recent Posts
					<li>
						
				</ul>
			</div>
						</div>
                    </div>
				<!--end row-->
                </div>
            </section>
			
			<!--Related Products-->
			@auth
			<div class="card ml-5 col-lg-8">
				<ul class="list-group list-group-horizontal">
					<h5 class="list-group-item active">
						Comments
					<h5>
					<div class="card-body">
					<form method="post" action="{{route('save_comment',[$blog->id])}}">
					@csrf
						<textarea name="comment" class="form-control py-5"></textarea>
						<input type="submit" class="btn btn-primary mt-3">
					</div>
						
				</ul>
			</div>
			@endauth
			<div class="card ml-5 col-lg-8">
				<h5 class="card-header mb-4">Comments<span class="badge badge-info ml-2">{{count($blog->comments)}}</span></h5>
				<div class="card-body mt-3">
					@if($blog->comments)
						@foreach($blog->comments as $comment)
						<blockquote class="blockquote">
							<p class="mb-0">{{$comment->comment}}</p>
							<footer class="blockquote-footer">Username</footer>
						</blockquote>
						<hr>
						@endforeach
					@endif
				</div>
			</div>
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
