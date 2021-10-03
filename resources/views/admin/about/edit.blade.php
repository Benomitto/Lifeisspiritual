@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-8 mx-auto card p-3">
			<h5 class="text-center text-primary">Update About</h5>
			<form method="post" action={{route('about.update',$about->id)}} enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$about->title}}" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description">{{$about->description}}</textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description">{{$about->sentence}}</textarea>
				</div>
				<div class="form-group"><img src="{{asset('images/product/'.$product->image)"  class="img-fluid" width="200" height="100" alt=""></div>
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
 