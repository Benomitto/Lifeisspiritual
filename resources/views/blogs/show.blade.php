<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Life Is Spiritual</title>
        <!-- Favicon-->
        
        <!-- Core theme CSS (includes Bootstrap)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
		<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="/assets/font-awesome/css/fontawesome-all.min.css">
		<link rel="stylesheet" href="/assets/css/magnific-popup.css">
		<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
		
    </head>
    <body>
        <!-- Responsive navbar-->
       @include('layouts.navbar')
        <!-- Page content-->
		<!--Section Start-->
				<section class="bg-cencer bg-contain" style="background: url(/assets/img/blog.jpg)">
      <div class="dark-overlay">
        <div class="overlay-content py-5 index-forward">
          <div class="container py-5 mt-5">
            <div class="row py-5 text-white text-center">
              <div class="col-lg-7 mx-auto">
                <h4 class="text">{{$blog->title}}</h4>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		<!--Section End-->
        <div class="container py-5 mt-5">
            <div class="row py-5">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$blog->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <p>{{$blog->month}}</p> by {{$blog->writer}}</div>
                            <!-- Post categories-->
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{'/images/blogs/'.$blog->image}}" alt="" width="900" height="400"/></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$blog->body}}</p>
                            <a href=""><button type="submit" class="btn btn-outline-primary">Read More</button></a>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5"><h5 class="list-group-item active">Comments<span class="badge badge-primary ml-2">{{count($blog->comments)}}</span></h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4" method="POST" action="{{route('save_comment',[$blog->id])}}">
								@csrf
								@auth
								<textarea name="comment" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
								<input type="submit" value="Post Comment" class="btn btn-primary mt-3">
								
                                @endauth
								<!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    
                                    <div class="ms-3">
                                        <div class="d-flex mt-4">
                                            
                                            <div class="ms-3">
											@if($blog->comments)
													@foreach($blog->comments as $comment)
                                                <div class="fw-bold">{{$comment->user_name}}<span class="text-black-50 sm"> {{$comment->created_at->diffForHumans()}}</span></div>
                                                <p>{{$comment->comment}}</p>
													<div class="flex items-center">
														<form></form>
													</div>
													@endforeach
												@endif
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                    </div>
                                </div>
                                <!-- Single comment-->
                                
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4"><br><br><br><br><br><br><br><br><br><br>
                    <!-- Search widget-->
                    <div class="card mt-5">
                        <div class="list-group-item active">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control px-1" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" /><br>
                                <button class="btn btn-outline-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                   <!-- <div class="card mb-4">
                        <div class="list-group-item active">Similiar Posts</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">The Truth About Money</a></li>
                                        <li><a href="#!">Understand what Salvation really means</a></li>
                                        <li><a href="#!">Welcome tolife is spiritual ministries</a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>-->
                    <!-- Side widget-->
                    
                </div>
            </div>
        </div>
        <!-- Footer-->
         <footer class="footer-top" id="ts-footer">
            <section id="contact" class="ts-separate-bg-element" data-bg-image="assets/img/bg-hand-mobile.jpg" data-bg-image-opacity=".1" data-bg-color="#12264f">
                @include('layouts.footer')
            </section>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
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
    <script src="/assets/js/scripts.js"></script>
    </body>
</html>
