@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3 ">
        <div class="col-md-8 mx-auto card p-3">
			<h5 class="text-center text-primary">Add New Blog</h5>
			<form method="post" action={{route('blog.store')}} enctype="multipart/form-data" >
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="date" name="date" placeholder="Date">
				</div>
				<div class="form-group"><img src="{{('/images/blogs/'.$blog->image)}}"  class="img-fluid" width="200" height="300" alt=""></div>
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
 