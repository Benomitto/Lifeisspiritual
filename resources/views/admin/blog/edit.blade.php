@extends('layouts.master')

@section('content')

<div class="container ">
    <div class="row p-3 ">
        <div class="col-md-11 mx-auto card p-3 ">
			<h5 class="text-center text-primary ">Update Blog</h5>
			<form method="post" action={{route('blog.update',$blog->id)}} enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$blog->title}}" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$blog->date}}" type="date" name="date" placeholder="Date">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description">{{$blog->description}}</textarea>
				</div>
				<div class="form-group"><img src="{{asset($blog->image)}}"  class="img-fluid" width="200" height="300" alt=""></div>
				<div class="form-group">
					<input class="form-control" type="file" name="image" >
				</div>
				<div class="form-group">
					<select class="form-control" 
					name="category_id" 
					<option value="" selected>
						Choose a category
					</option>
					@foreach($blogs as $blog) 
					
					<option {{$blog->id === $blog->id ? "selected" : ""}} value="{{$blog->id}}">
					{{$blog->title}}
					</option>
					@endforeach</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			
        </div>
    </div>	
</div>
@endsection
 