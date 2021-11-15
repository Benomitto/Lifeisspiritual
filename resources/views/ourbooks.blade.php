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

    <style type="text/css">
        .carousel-indicators .active {
            background-color: #3a79f9 !important;
        }
        .carousel-indicators li {
            position: relative;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            width: 30px;
            height: 3px;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #666666;
        }
        .carousel-multi-item {
            margin-bottom: 5rem;
        }
        .carousel-multi-item .controls-top {
            margin-bottom: 1.88rem;
            text-align: center;
        }
        .waves-effect {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }
        .carousel-multi-item .controls-top .btn-floating {
            background: #4285f4;
        }
        a.waves-effect, a.waves-light {
            display: inline-block;
        }


        .btn-floating {
            position: relative;
            z-index: 1;
            display: inline-block;
            padding: 0;
            margin: 10px;
            overflow: hidden;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
            -webkit-box-shadow: 0 5px 11px 0 rgb(0 0 0 / 18%), 0 4px 15px 0 rgb(0 0 0 / 15%);
            box-shadow: 0 5px 11px 0 rgb(0 0 0 / 18%), 0 4px 15px 0 rgb(0 0 0 / 15%);
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            width: 47px;
            height: 47px;
        }
        .btn-floating i {
            display: inline-block;
            width: inherit;
            color: #fff;
            text-align: center;
        }
        .btn-floating i {
            font-size: 1.25rem;
            line-height: 47px;
        }
    </style>

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
    <div class="container my-4">

  
  
  <hr class="mb-5"/>

  <!--Carousel Wrapper-->
  @php
        $index =1;
        $indicators = 0;
        $if= 0;
        $active = 'active';
        $indicators_active = 'active';

      @endphp
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

    <!--Controls-->
    <div class="controls-top">
      <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
      <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

    <!--Indicators-->
    <ol class="carousel-indicators">

      @foreach($products as $product)
      @if($indicators== 0 )    
      <li data-target="#multi-item-example" data-slide-to="{{$if}}" class="{{$indicators_active}}"></li>
      @endif
        @php

            $indicators++;
            if($indicators == 3){
                $indicators = 0;
                $if++;
            }
            $indicators_active = "";

        @endphp
      @endforeach
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      
      <!--First slide-->
      @foreach($products as $product)
      @if($index== 1 )    

      <div class="carousel-item  {{$active}}">

        <div class="row">
       @endif
          <div class="col-md-3">
            <div class="card mb-2">
              <img class="card-img-top" src="{{asset($product->image)}}"
                   alt="Card image cap">
              <div class="card-body">
                <div class="text-center"><h5  alt="{{$product->title}}" class="card-title">{{$product->title}}</h5></div>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p> -->
                <p class="card-text"> 
                   <div class="text-center"> <i class="text-muted"><strike>Ksh.{{$product->old_price}}</strike></i>
                    <span class="text-primary font-weight-bold">Ksh.{{$product->price}}</span></div>
                </p>
                <div class="text-center"><a href="{{route('products.show',$product->slug)}}" class="btn btn-primary">View</a></div>
              </div>
            </div>
          </div>
          

        @if($index == 4 )    

          </div>
        </div>
        @endif

        @php
        $active="";
          $index++;

          if($index == 5){
            $index = 1;
          }

          @endphp
           @endforeach

      </div>

      <!--/.First slide-->
    
     

     

    </div>
    <!--/.Slides-->

  </div>
  <!--/.Carousel Wrapper-->


</div>
	
</div>
   			
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
