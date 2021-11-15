@extends('layouts.master')

@section('css')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
@endsection

@section('content')

<div class="container">
    <div class="row p-3">
        <div class="col-md-11 card p-3">
			<h5 class="text-center text-primary">Blog</h5>
			<div class="form-group">
				
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
					<i class="fa fa-plus"></i>
				</a>
				<!--Modal Start-->
							<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-body">
													<div class="container">
    <div class="row p-3 ">
        <div class="col-md-6 mx-auto card p-3">
			<h5 class="text-center text-primary">Add New Blog</h5>
			<form method="post" action={{route('blog.store')}} enctype="multipart/form-data" >
			@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="slug" placeholder="slug">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="body" placeholder="body"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="month" placeholder="Date">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="writer" placeholder="Author">
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

											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
											  </div>
											</div>
										  </div>
										</div>
				<!--Modal End-->
			</div>
				<table id="blogs" class="table table-bordered border-dark">
					<thead class="table table-bordered border-dark">
						<tr>
							<td>Id</td>
							<td>Title</td>
							<td>Date</td>
							<td>Description</td>
							<td>Slug</td>
							<td>Body</td>
							<td>Author</td>
							<td>Image</td>
						
							<td></td>
						</tr>
					</thead>
					<tbody class="table table-bordered border-dark">
						@foreach ($blogs as $blog)
							<tr>
								<td>{{$blog->id}}</td>
								<td>{{$blog->title}}</td>
								<td>{{$blog->month}}</td>
								<td>{{Str::limit($blog->description,200)}}</td>
								<td>{{Str::limit($blog->slug,200)}}</td>
								<td>{{$blog->body}}</td>
								<td>{{$blog->writer}}</td>
								<td><img src="{{('/images/blogs/'.$blog->image)}}"  class="img-fluid" width="100" height="100" alt="{{$blog->title}}">
									
								</td>
									
									
									<td class="d-flex flex-row justify-content-center align-items-center">
									<div class="form-group">
									<div class="dropdown">
<a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false"><svg class="bi bi-three-dots-vertical" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><button type="submit" class="btn btn-link dropdown-item" data-toggle="modal" data-target="#editBackdrop">Edit</button></li>
    <form action="{{route('blog.destroy',$blog->id)}}" method="post">
											@csrf
											@method('DELETE')
	<li><button type="submit" class="btn btn-link dropdown-item">Delete</button></li>
	</form>
  </ul>
</div>
									<!--Modal Start-->


											<!-- Modal -->
											<div class="modal fade" id="editBackdrop_{{$blog->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-body">
														<div class="container ">
    <div class="row p-3 ">
        <div class="col-md-6 mx-auto card p-3 ">
			<h5 class="text-center text-primary ">Update Blog</h5>
			<form method="post" action="{{route('blog.update',$blog->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="form-group">
					<input class="form-control" value="{{$blog->title}}" type="text" name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$blog->month}}" type="text" name="month" placeholder="Date">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="description">{{$blog->description}}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" value="{{$blog->slug}}" type="text" name="slug" placeholder="Title">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="body" placeholder="body">{{$blog->body}}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="writer" placeholder="Author" value="{{$blog->writer}}">
				</div>
				<div class="form-group"><img src="{{('/images/blogs/'.$blog->image)}}"  class="img-fluid" width="200" height="300" alt=""></div>
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
										
									</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
				
				<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
				<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
				<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
				<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
				<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
				
				<script>
					$(document).ready(function() {
					var table = $('#blogs').DataTable( {
					responsive: true
					} );
					new $.fn.dataTable.FixedHeader( table );
					} );
				</script>
				
				<div class="text-center">{{$blogs->links()}}</div>
				
        </div>
    </div>	
</div>
@endsection
 