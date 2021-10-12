<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
	public function index()
	{
		$data = Payments::join('payments','payments.phone', '=' 'user.phone')
		
	}
}
