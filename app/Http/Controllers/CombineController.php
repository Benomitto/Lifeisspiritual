<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combine;
use App\Models\Order;

class CombineController extends Controller
{
    //
	public function index()
	{
		$data = Order::join('payments','payments.phone', '=', 'orders.phone')
							
						  ->get(['payments.phone','payments.amount','payments.mpesa_trans_id']);
						  
						  return view('combine',compact('data'));
	}
	
	
}
