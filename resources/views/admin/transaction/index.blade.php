@extends('layouts.master')
@section('content')
<div class="container">
    @if(session()->has('error'))
    <p class="text-danger">{{session('error')}}</p>
    @endif
    <div class="row">
        <div class="col-md8 offset-md-2">
            <table class="table table-bordered border-dark">
                <thead class="table table-bordered border-dark" >
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User</th>
                        <th scope="col">House Address</th>
                        <th scope="col">Postcode</th>
						<th scope="col">Phone</th>
						<th scope="col">Amount</th>

                    </tr>
                </thead>
                <tbody>
                    @if($trans->count() > 0)
                    @foreach($trans as $tran)
                    <tr>
                        <th scope="row">{{$tran->transaction_id}}</th>
                        <td>{{$tran->user->name}}</td>
                        <td>{{$tran->houseadd}}</td>
						<td>{{$tran->postcode}}</td>
						<td>{{$tran->phone}}</td>
						<td>{{$tran->amount}}</td>
                        <td>{{$tran->created_at}}</td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection