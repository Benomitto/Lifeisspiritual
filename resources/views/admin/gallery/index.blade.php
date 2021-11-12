@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-11 card p-3">
			<h5 class="text-center text-primary">Index Page</h5>
			<div class="form-group">
				
				<div class="text-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fa fa-plus"></i>
				</a></div>
				<!--Modal Start-->
						<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-body">
									<!--Create Start-->
											<div class="container">
    <div class="row p-3">
        <div class="col-md-6 mx-auto card p-3 justify-content-center">
			<h5 class="text-center text-primary">Add Items</h5>
			<form method="post" action={{route('gallery.store')}} enctype="multipart/form-data">
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="description" placeholder="Description">
				</div>
				<div class="form-group">
					<input class="form-control" type="file" name="image[]" multiple>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			
        </div>
    </div>	
</div>
									<!--Create End-->
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							  </div>
							</div>
						  </div>
						</div>
				<!--Modal End-->
				</div>
				<table class="table table-bordered border-dark">
					<thead class="table table-bordered border-dark">
						<tr>
							<td>Id</td>
							<td>Title</td>
							<td>Description</td>
							<td>Image</td>
							<td></td>
						</tr>
					</thead>
					<tbody class="table table-bordered border-dark">
						@foreach ($galleries as $gallery)
							<tr>
								<td>{{$gallery->id}}</td>
								<td>{{$gallery->title}}</td>
									<td>{{Str::limit($gallery->description,200)}}</td>
									<td>
										@php
										$images= explode("|",$gallery->image)
										@endphp

										@foreach ($images as $img)
										<img src="{{asset('images/gallery/'.$img)}}" alt="Image"
									class="image-fluid"
									width="50"
									height="50">
									@endforeach
									</td>
									
									
									
									<td class="d-flex flex-row justify-content-center align-items-center">
									<div class="form-group">
									<div class="dropdown">
<a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false"><svg class="bi bi-three-dots-vertical" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><button type="submit" class="btn btn-link dropdown-item" data-toggle="modal" data-target="#editBackdrop">Edit</button></li>
    <form action="{{route('gallery.destroy',$gallery->id)}}" method="post">
											@csrf
											@method('DELETE')
	<li><button type="submit" class="btn btn-link dropdown-item">Delete</button></li>
	</form>
  </ul>
</div>
									
									<!--Edit Modal Start-->
										<div class="modal fade" id="editBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-body">
													<!--Edit-->
															<div class="container ">
    <div class="row p-3 ">
        <div class="col-md-6 mx-auto card p-3 ">
			<h5 class="text-center text-primary ">Edit Index Page</h5>
			<form method="post" action="{{route('gallery.update',$gallery->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$gallery->title}}" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$gallery->description}}" type="text" name="description" placeholder="Description">
				</div>
				<div class="form-group">
					<img src="{{asset('images/slider/'.$gallery->image)}}"  class="img-fluid" width="100" height="100" alt="">
				</div>
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
													<!--Edit-->
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
									<!--Edit Modal End-->
									
									</div>
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
 