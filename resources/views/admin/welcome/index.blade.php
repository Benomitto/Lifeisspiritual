@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-11 card p-3">
			<h5 class="text-center text-primary">Index Page</h5>
			<div class="form-group">
				
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fa fa-plus"></i>
				</a>
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
			<form method="post" action={{route('welcome.store')}} enctype="multipart/form-data">
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
									<!--Create Ennd-->
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
							<td>Intro</td>
							<td>Descri</td>
							<td>Introduction</td>
							<td>Descript</td>
							<td>Description</td>
							<td>About</td>
							<td>Donate</td>
							<td>Image</td>
							<td></td>
						</tr>
					</thead>
					<tbody class="table table-bordered border-dark">
						@foreach ($welcomes as $welcome)
							<tr>
								<td>{{$welcome->id}}</td>
								<td>{{$welcome->intro}}</td>
									<td>{{Str::limit($welcome->descri,200)}}</td>
									<td>{{$welcome->introduction}}</td>
									<td>{{Str::limit($welcome->descript,200)}}</td>
									<td>{{Str::limit($welcome->description,200)}}</td>
									<td>{{Str::limit($welcome->button,200)}}</td>
									<td>{{Str::limit($welcome->btn,200)}}</td>
									<td><img src="{{asset('images/slider/'.$welcome->image)}}" alt="Image"
									class="image-fluid"
									width="50"
									height="50">
									</td>
									
									
									
									<td class="d-flex flex-row justify-content-center align-items-center">
									<div class="form-group">
									<a href="#" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editBackdrop">
										<i class="fa fa-edit"></i>
									</a>
									
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
			<form method="post" action={{route('welcome.update',$welcome->id)}} enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$welcome->intro}}" type="text" name="intro" placeholder="Intro">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="descri" placeholder="description">{{$welcome->descri}}</textarea>
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
					<input class="form-control" type="text" name="button" placeholder="button">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="btn" placeholder="Donate button">
				</div>
				<div class="form-group">
					<img src="{{asset('images/slider/'.$welcome->image)}}"  class="img-fluid" width="100" height="100" alt="">
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
										<form action="{{route('welcome.destroy',$welcome->id)}}" method="post">
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
 