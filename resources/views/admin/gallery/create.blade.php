@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-8 mx-auto card p-3">
		 @if(session('status'))
			 <h6 class="alert alert-success">{{session('status')}} </h6>@endif
			<h5 class="text-center text-primary">Add Items</h5>
			<form method="post" action={{route('/admin/gallery',$gallery->id)}} enctype="multipart/form-data">
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="description" placeholder="Description">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="sentence" placeholder="Sentence">
				</div>
				<div class="form-group"><img src="{{/assets/img/($gallery->image)}}"  class="img-fluid" width="50" height="50" alt=""></div>
				<div class="form-group">
					<input class="form-control" type="file" name="image[]" >
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			
        </div>
    </div>	
</div>
@endsection
 