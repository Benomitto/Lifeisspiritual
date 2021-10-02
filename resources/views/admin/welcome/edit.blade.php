@extends('layouts.master')

@section('content')

<div class="container mb-5">
    <div class="row p-3 ">
        <div class="col-md-11 mx-auto card p-3 ">
			<h5 class="text-center text-primary ">Update Index Page</h5>
			<form method="post" action={{route('welcome.update',$welcome->id)}} enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$welcome->intro}}" type="text" name="intro" placeholder="Intro">
				</div>
				<div class="form-group">
					<textarea class="form-control" value="{{$welcome->descri}} rows="5" cols="30" name="descri" placeholder="description">{{$welcome->descri}}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$welcome->introduction}}" type="text" name="introduction" placeholder="Intro">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="descript" placeholder="description">{{$welcome->descript}}</textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description">{{$welcome->description}}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="file" name="image" >
					<img src="{{'/assets/img/'.$welcome->image}}"  class="img-fluid" width="50" height="50" alt="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
        </div>
    </div>	
</div>


@endsection
 