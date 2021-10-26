<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

	
    <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<title>Life Is Spiritual</title>

</head>
  <body>
    
@include('layouts.navbar') 
            <!--Start Form-->
				<div class="container pt-5 pb-5">
				<form action="{{ route('customerinfo.store') }}" method="post" id="customerinfo">
				@csrf
				<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg md:max-w-xl mx-2 pt-5 mt-5">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="flex flex-row">
                        <h2 class="text-3xl font-semibold"></h2>
                        <h2 class="text-3xl text-blue-400 font-semibold">Life Is Spiritual</h2>
                    </div>
                    <div class="flex flex-row pt-2 text-xs pt-6 pb-5"> 
						<span class="font-bold">Additional Information</span> 
						<small class="text-gray-400 ml-1">></small> </small>
					</div> 
					
					<span>Customer Information</span>
                    <div class="relative pb-5"> 
						<input spellcheck="true" type="text" name="email" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="E-mail" required>
					</div> 
					
					<span>Shipping Address</span>
                    
					<input type="text" name="name" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Username*" required> 
					<div class="grid md:grid-cols-3 md:gap-2">
					<input type="text" name="zipcode" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Zipcode*"> 
					<input type="text" name="city" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="City*" required> 
					<input type="text" name="state" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="State*" required> </div>
					<input type="text" name="country" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Country*" required> 
					
                    <div class="flex justify-between items-center pt-3"> <a href="/cart">
					<button type="submit" class="h-12 w-24 text-red-500 text-xs bg-gray-200 font-medium">Return to cart</button>
					<button type="submit" class=" h-12 w-48 rounded font-medium text-xs bg-blue-500 text-white ml-5" id="btnblue" data-toggle="modal" data-target="#phoneModal">Continue to Payment</button>
					</div>
                </div>
            </div>
        </div>
		</form>
    </div>
				
			<!--End Form-->
			
	
	 
	
	<script src="assets/js/custom.hero.js"></script>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/isInViewport.jquery.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/scrolla.jquery.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
	<script type='text/javascript' src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js'></script>
    <script type='text/javascript'></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
