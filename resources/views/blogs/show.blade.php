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
		
		<section id="blog-single-post">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="blog-single-post-thumb">
                         

                         <div class="blog-post-title">
                              <h2>{{$blog->title}}</a></h2>
                         </div>

                         <div class="blog-post-format">
                              <span><a href="#"><img src="images/author-image1.jpg" class="img-responsive img-circle">{{$blog->writer}}</a></span>
                              <span><i class="fa fa-date"></i> {{$blog->month}}</span>
                              <span><a href="#"><i class="fa fa-comment-o"></i> {{count($blog->comments)}} Comments</a></span>
							   <span><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Likes</a></span>
                         </div>

                         <div class="blog-post-des">
							  <blockquote>{{$blog->description}}</blockquote>
                              <p>{{$blog->body}}</p>
                              
                              <div class="blog-post-image">
                              <img src="{{'/images/blogs/'.$blog->image}}" class="img-responsive" alt="Blog Image 3">
                         </div>
					   </div>
                         
                     
                         <p>The greatest sin is the misallocation of time.
If no time is given to wastage, then time will be properly used for profit, instead of loss. Some people allocate their time for loss, others allocate their time for profit. So some grow rich, while others grow/stay poor. Time, the great equalizer is given to them all by our Heavenly Father.</p>


<form action = "{{route('blog.likes',$blog->id)}}" method="post" class="mr-1">
@csrf
<button type="submit">Like</button>
@if($blog->likes)
<span>{{$blog->likes->count()}}</span>
@endif
</form>
                         <div class="blog-author">
                              <div class="media">
                                  
                                   <div class="media-body">
                                        <h3 class="media-heading"><a href="#">{{$blog->writer}} ( Evangelist )</a></h3>
                                        <p>Tim is married to Erica Mukisa Kimani and is a family man and a man of God. We believe that there are many deep and wonderful truths hidden in the bible which God's children need to know.</p>
                                   
								   </div>
								   
								   
                              </div>
                         </div>
						 

                        <div class="blog-comment"><h3>Comments {{count($blog->comments)}}</h3></div>
						<div class="blog-comment-form"><h3>Leave a Comment</h3></div>

                         
</section>
		
        <div class="container py-5 mt-5">
            <div class="row py-5">
                <div class="col-lg-8">
                    <!-- Post content-->
                   
                    <!-- Comments section-->
                    <section class="mb-5">
					<h5 class="list-group-item active">Comments<span class="badge badge-primary ml-2">{{count($blog->comments)}}</span></h5>
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
	<script src="https://use.fontawesome.com/a7e58df41d.js"></script>
    </body>
</html>
