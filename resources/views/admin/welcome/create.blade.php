@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-8 mx-auto card p-3">
		 @if(session('status'))
			 <h6 class="alert alert-success">{{session('status')}} </h6>@endif
			<h5 class="text-center text-primary">Add Items</h5>
			<form method="post" action={{route('/admin/welcome',$welcome->id)}} enctype="multipart/form-data">
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="intro" placeholder="Intro">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="descri" placeholder="description"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="introduction" placeholder="Introduction">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="descript" placeholder="description"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="button" placeholder="button">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="btn" placeholder="Donate button">
				</div>
				<div class="form-group"><img src="{{/assets/img/($welcome->image)}}"  class="img-fluid" width="1920" height="1080" alt=""></div>
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
 