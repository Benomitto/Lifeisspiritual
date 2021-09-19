<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ActivateYourAccount;
use Illuminate\Support\Facades\Mail;

class ActivateAccountController extends Controller
{
    //
	public function activation($code){
		$user = User::where('code',$code)->first();
		$user->code = null;
		$user->update([
			'active' => 1
		]);
		auth()->login($user);
		return redirect('/')->withSuccess('Connected');
	}
	
	public function resendCode($email){
		$user = User::where('email',$email)->first();
		if($user->active){
			return redirect('/');
		}
		Mail::to($user)->send(new ActivateYourAccount($user->code));
		return redirect('/login')->withSuccess('The link was sent to your email address');
	}
}
