@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row p-3">
        <div class="col-md-11 card p-3">
			<h5 class="text-center text-primary">About Us</h5>
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
        <div class="col-md-6 mx-auto card p-3">
			<h5 class="text-center text-primary">About Us</h5>
			<form method="post" action={{route('about.store')}} enctype="multipart/form-data">
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="header" placeholder="Header">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="describe" placeholder="Describe 1st Paragraph"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="described" placeholder="Describe 2nd Paragraph"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="button" placeholder="Button">
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
									<!--Create End-->
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
				<!--Modal End-->
				<table class="table table-bordered border-dark">
					<thead class="table table-bordered border-dark">
						<tr>
							<td>Id</td>
							<td>Header</td>
							<td>Describe</td>
							<td>Described</td>
							<td>Buttton</td>
							<td>Image</td>
							<td></td>
						</tr>
					</thead>
					<tbody class="table table-bordered border-dark">
						@foreach ($abouts as $about)
							<tr>
									<td>{{$about->id}}</td>
									<td>{{$about->header}}</td>
									<td>{{$about->describe}}</td>
									<td>{{$about->described}}</td>
									<td>{{$about->button}}</td>
									<td><img src="{{asset('images/about/'.$about->image)}}" alt="{{$about->title}}"
									class="image-fluid"
									width="50"
									height="50"></td>
									
									<td class="d-flex flex-row justify-content-center align-items-center">
									<div class="form-group">
									<a href="#" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editBackdrop">
										<i class="fa fa-edit"></i>
									</a>
										<!--Modal Start-->
												<!-- Modal -->
												<div class="modal fade" id="editBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												  <div class="modal-dialog">
													<div class="modal-content">
													  <div class="modal-body">
															<div class="container">
															<div class="row p-3">
																<div class="col-md-6 mx-auto card p-3">
																	<h5 class="text-center text-primary">Update About</h5>
																	<form method="post" action={{route('about.update',$about->id)}} enctype="multipart/form-data">
																	@csrf
																	@method('PUT')
																		<div class="form-group">
																			<input class="form-control" value="{{$about->header}}" type="text" name="header" placeholder="Header">
																		</div>
																		<div class="form-group">
																			<textarea class="form-control" rows="5" cols="30" name="describe" placeholder="describe">{{$about->describe}}</textarea>
																		</div>
																		<div class="form-group">
																			<textarea class="form-control" rows="5" cols="30" name="described" placeholder="described">{{$about->described}}</textarea>
																		</div>
																		<div class="form-group">
																			<input class="form-control" value="{{$about->button}}" type="text" name="button" placeholder="Button">
																		</div>
																		<div class="form-group"><img src="{{asset('images/about/'.$about->image)}}"  class="img-fluid" width="100" height="100" alt=""></div>
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
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
													  </div>
													</div>
												  </div>
												</div>

										<!--Modal End-->
									</div>
										<form action="{{route('about.destroy',$about->id)}}" method="post">
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
 