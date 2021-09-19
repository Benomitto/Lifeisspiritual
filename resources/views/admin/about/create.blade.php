@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-8 mx-auto card p-3">
			<h5 class="text-center text-primary">About Us</h5>
			<form method="post" action={{route('about.store')}} enctype="multipart/form-data">
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="Sentence|Sentence appears on the right side"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="sentence" placeholder="Sentence|Sentence appears on the right side"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="file" name="image" >
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="paragraph" placeholder="Sentence|Sentence appears on the left side"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="segment" placeholder="Sentence|Sentence appears on the left side"></textarea>
				</div>
				
				<div class="form-group">
					<input class="form-control" type="file" name="photo" >
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			
        </div>
    </div>	
</div>
@endsection
 