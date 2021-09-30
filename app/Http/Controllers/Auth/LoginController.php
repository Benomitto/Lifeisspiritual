<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
		/*protected function redirectTo(){
			if(Auth::user()->userType == 'admin'){
				return('/admin');
			}else{
				return ('/');
			}
		}*/
	
		
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	 /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
		if(!$user->active){
			auth()->logout();
			return redirect('/login')
			->with([
				'errorLink' => 'Activate your account 
				<a href="'.route('code.resend',$user->email).'">Click Here To Resend The Code</a>'
			
			])->withEmail($user->email);
		}
		
		if(Auth::user()->usertype == 'admin'){
				return redirect('/admin')->with('status','Welcome');
			}else{
				return redirect()->back()->with('status','Welcome home');
			}

    }

}
