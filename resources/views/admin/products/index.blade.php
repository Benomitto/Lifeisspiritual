@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-11 card p-3">
			<h5 class="text-center text-primary">Products</h5>
			<div class="form-group">
				
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-plus"></i>
				</a>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-body">
								<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto card">
			<h5 class=" text-primary">Add Products</h5>
			<form method="post" action={{route('products.store')}} enctype="multipart/form-data">
			@csrf
				<div class="form-group form-group-md">
					<input class="form-control" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="number" name="price" placeholder="Price">
				</div>
				<div class="form-group">
					<input class="form-control" type="number" name="old_price" placeholder="Old Price">
				</div>
				<div class="form-group">
					<input class="form-control" type="number" name="inStock" placeholder="Quantity in stock">
				</div>
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
					
					<option value="{{$category->id}}">
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
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							
						  </div>
						</div>
					  </div>
					</div>

			</div>
			
			
			
				<table class="table table-bordered border-dark">
					<thead class="table table-bordered border-dark">
						<tr>
							<td>Id</td>
							<td>Title</td>
							<td>Description</td>
							<td>Price</td>
							<td>In Stock</td>
							<td>Category</td>
							<td>Image</td>
						
							<td></td>
						</tr>
					</thead>
					<tbody class="table table-bordered border-dark">
						@foreach ($products as $product)
							<tr>
								<td>{{$product->id}}</td>
								<td>{{$product->title}}</td>
									<td>{{Str::limit($product->description,40)}}</td>
									<td>{{$product->price}}Ksh</td>
									<td>{{$product->inStock}}</td>
									<td>{{$product->category->title}}</td>
									<td><img src="{{asset($product->image)}}" alt="{{$product->title}}"
									class="image-fluid"
									width="50"
									height="50">
									</td>
									
									
									<td class="d-flex flex-row justify-content-center align-items-center">
									<div class="form-group">
									<a href="#" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editBackdrop">
										<i class="fa fa-edit"></i>
									</a>
									<!--Modal Start-->
											<!-- Modal -->
											<div class="modal fade" id="editBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editBackdropLabel" aria-hidden="true">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-body">
															<div class="container ">
    <div class="row p-3 ">
        <div class="col-md-6 mx-auto card p-3 ">
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

												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>

									<!--Modal End-->
									</div>
										<form action="{{route('products.destroy',$product->slug)}}" method="post">
											@csrf
											@method('DELETE')
											
											<div class="form-group">
												<button type="submit" class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i>
												</button>
												
											</div>
										</form>
									</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
				<div class="my-3 d-flex justify-content-center">
				
				</div>
        </div>
    </div>	
</div>

@endsection
 