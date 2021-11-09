<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combine;
use App\Models\Order;
use App\Models\User;
use DB;

class CombineController extends Controller
{
    //
	public function index()
	{
		$data = DB::table('users')
					->join('payments','payments.user_id', '=', 'users.id')
					->join('customerinfos','users.id','=', 'customerinfos.user_id')
					->select('customerinfos.name','payments.phone','customerinfos.email','payments.amount','payments.mpesa_trans_id')
					->get();
					
					
						  
						  return view('combine',compact('data'));
	}
	
	
}
