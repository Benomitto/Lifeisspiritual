@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row p-3">
        <div class="col-md-12 card p-3">
			<h5 class="text-center text-primary">Orders</h5>
				<table class="table table-hover">
					<thead>
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Book Id</td>
							<td>Qty</td>
							<td>Price</td>
							<td>Total</td>
							<td>Delivered</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{Auth::user()->name}}</td>
									<td>{{$order->product_name}}</td>
									<td>{{$order->qty}}</td>
									<td>{{$order->price}}Ksh</td>
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
				<div class="my-3 d-flex justify-content-center">
				
				</div>
        </div>
    </div>	
</div>
@endsection
 