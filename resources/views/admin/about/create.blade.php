@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-8 mx-auto card p-3">
			<h5 class="text-center text-primary">About Us</h5>
			<form method="post" action={{route('/admin/about',$about->id)}} enctype="multipart/form-data">
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="header" placeholder="Header">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="describe" placeholder="Describe 1st Paragraph"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="described" placeholder="Described 2nd Paragraph"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="button" placeholder="Button"></textarea>
				</div>
				<div class="form-group"><img src="{{/assets/img/($about->image)}}"  class="img-fluid" width="500" height="500" alt=""></div>
				<div class="form-group">
					<input class="form-control" type="file" name="image" >
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			
        </div>
    </div>	
</div>
@endsection
 