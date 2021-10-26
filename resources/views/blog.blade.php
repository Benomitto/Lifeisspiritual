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
			
			
			<section class="bg-cencer bg-contain" style="background: url(assets/img/blog.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">Blog</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
	<section id="blog">
     <div class="container">
	 @foreach($blogs as $blog)
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="blog-post-thumb">
                         <div class="blog-post-image">
                              <a href="single-post.html">
                                   <img src="{{'/images/blogs/'.$blog->image}}" class="img-responsive" alt="Blog Image">
                              </a>
                         </div>
                         <div class="blog-post-title">
                              <h3><a href="{{route("article.show",$blog->slug)}}">{{$blog->title}}</a></h3>
                         </div>
                         <div class="blog-post-format">
                              </span>
                              <span><i class="fa fa-date"></i> {{$blog->date}}</span>
                              <span><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{count($blog->comments)}} Comments</a></span>
							  <span><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{count($blog->comments)}} Likes</a></span>
                         </div>
                         <div class="blog-post-des">
                              <p>{{$blog->body}}</p>
                              <a href="{{route("article.show",$blog->slug)}}" class="btn btn-outline-secondary">Continue Reading</a>
                         </div>
                    </div>  
               </div>
			  
          </div>@endforeach
     </div>
</section> <div class="pagination justify-content-center">{{$blogs->links()}}</div>         
			

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
	
<script src="https://use.fontawesome.com/a7e58df41d.js"></script>

  </body>
</html>
