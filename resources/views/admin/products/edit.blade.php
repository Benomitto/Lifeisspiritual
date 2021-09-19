@extends('layouts.master')

@section('content')

<div class="container ">
    <div class="row p-3 ">
        <div class="col-md-11 mx-auto card p-3 ">
			<h5 class="text-center text-primary ">Update Products</h5>
			<form method="post" action={{route('products.update',$product->slug)}} enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$product->title}}" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description">{{$product->description}}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$product->price}}" type="number" name="price" placeholder="Price">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$product->old_price}}" type="number" name="old_price" placeholder="Old Price">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$product->inStock}}" type="number" name="inStock" placeholder="Quantity in stock">
				</div>
				<div class="form-group"><img src="{{asset($product->image)}}"  class="img-fluid" width="200" height="300" alt=""></div>
				<div class="form-group">
					<input class="form-control" type="file" name="image" >
				</div>
				<div class="form-group">
					<select class="form-control" 
					name="category_id" 
					<option value="" selected>
						Choose a category
					</option>
					@foreach($categories as $category) 
					
					<option {{$category->id === $product->category->id ? "selected" : ""}} value="{{$category->id}}">
					{{$category->title}}
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
 