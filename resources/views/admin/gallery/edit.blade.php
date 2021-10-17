@extends('layouts.master')

@section('content')

<div class="container mb-5">
    <div class="row p-3 ">
        <div class="col-md-11 mx-auto card p-3 ">
			<h5 class="text-center text-primary ">Update Gallery Index Page</h5>
			<form method="post" action={{route('gallery.update',$gallery->id)}} enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$gallery->title}}" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$gallery->description}}" type="text" name="description" placeholder="Description">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$gallery->sentence}}" type="text" name="sentence" placeholder="Sentence">
				</div>
				<div class="form-group">
					<input class="form-control" type="file" name="image" >
					<img src="{{'/assets/img/'.$gallery->image}}"  class="img-fluid" width="50" height="50" alt="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
        </div>
    </div>	
</div>


@endsection
 