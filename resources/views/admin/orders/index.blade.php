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
			<h5 class="text-center text-primary">Orders</h5>
				<table id="example" class="table table-bordered border-dark">
					<thead class="table table-bordered border-dark">
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Book Id</td>
							<td>Qty</td>
							<td>Price</td>
							<td>Order Date</td>
							
							<td>Total</td>
							<td>Delivered</td>
							<td></td>
						</tr>
					</thead>
					<tbody class="table table-bordered border-dark">
						@foreach ($orders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{Auth::user()->name}}</td>
									<td>{{$order->product_name}}</td>
									<td>{{$order->qty}}</td>
									<td>{{$order->price}}Ksh</td>
									<td>{{$order->created_at}}</td>
									
									<td>{{$order->total}}Ksh</td>
									<td>@if($order->delivered)<i class="fa fa-check text-success"></i>@else
									<i class="fa fa-times text-danger"></i>@endif</td>
									<td class="d-flex justify-content-between">
										<form action="{{route('orders.update',$order->id)}}" method="post">
											@csrf
											@method('PUT')
											
											<div class="form-group">
												<button type="submit" class="btn btn-success btn-sm">
													<i class="fa fa-check"></i>
												</button>
												
											</div>
										</form>
										<form action="{{route('orders.destroy',$order->id)}}" method="post">
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
				
				<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
				<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
				<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
				<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
				<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
				
				<script>
					$(document).ready(function() {
					var table = $('#example').DataTable( {
					responsive: true
					} );
					new $.fn.dataTable.FixedHeader( table );
					} );
				</script>
				
					<div class="text-center">{{$orders->links()}}</div>
				
        </div>
    </div>	
</div>
@endsection
 
 @section('scripts')
 