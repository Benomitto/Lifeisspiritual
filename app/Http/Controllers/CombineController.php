<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combine;
use App\Models\Order;
use App\Models\User;

class CombineController extends Controller
{
    //
	public function index()
	{
		$data = User::join('payments','payments.id', '=', 'users.id')
					->join('customerinfos','users.name','=', 'customerinfos.name')
					->get(['customerinfos.name','payments.phone','customerinfos.email','payments.amount','payments.mpesa_trans_id']);
						  
						  return view('combine',compact('data'));
	}
	
	
}
