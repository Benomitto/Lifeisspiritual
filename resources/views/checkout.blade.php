<!doctype html>
	
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
     <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">-->
	<link rel="stylesheet" href="assets/css/checkout.css">
    <title>Life Is Spiritual</title>
  </head>
  <body>
    <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<div class="modal clearfix">
    <div class="modal-product">
      <div class="product">

        <!-- Slideshow container -->
        <div class="product-slideshow">

          <!-- Full-width images with number and caption text -->
          

          

          <br>

          <!-- The dots/circles -->
          <div style="text-align:center">
        
          </div>

        </div>

       

      </div>

      <div class="round-shape"></div>
    </div>
	
    <div class="modal-info">
      <div class="info">
        <h3 class="pb-5">Payment Information</h3>
        <form id="payment-form" action="{{ route('lipa',\Cart::getSubtotal()) }}" method="POST" class="mb-4">
		@csrf
			
			
			<label>
				<span>@lang('Address & City') <span class="required">*</span></span>
				<input type="text" name="houseadd" placeholder="Example:Kawaha Sukari,00115 Wudanyi Rd, Nairobi">
			</label>
			
			<label>
				<span> @lang('ZIP Address') <span class="required">*</span></span>
				<input type="text" name="postcode" placeholder="00115, Wudanyi Rd"> 
			</label>
			
			<label>
			  <span>@lang('Phone') <span class="required">*</span></span>
			  <input type="tel" name="phone" placeholder="07********">
			</label>
			
			<label>
				<div class="frm-grp">
                                <span>@lang('Amount')<span class="required">*</span></span>
                                <span class="text-box">{{\Cart::getSubtotal()}} Ksh</span>
								
                            </div>
			</label>

          <button type="submit" class="submit-btn">Pay Now</button>
        </form>
		
      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
     <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->@include('sweetalert::alert')
	<script src="assets/js/checkout.js"></script>
  </body>
</html>
