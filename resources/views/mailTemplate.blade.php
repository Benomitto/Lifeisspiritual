<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    <title>Life Is Spiritual</title>
  </head>
  <body>
    <p class="py-3"><Strong>Name</strong>{{$dataReceived ['name']}}</p>
	<p class="py-3"><Strong>Email</strong>{{$dataReceived ['email']}}</p>
	<p class="py-3"><Strong>Phone</strong>{{$dataReceived ['phone']}}</p>
	<h4>Message</h4>
	{{$dataReceived ['message']}}
  </body>
</html>
