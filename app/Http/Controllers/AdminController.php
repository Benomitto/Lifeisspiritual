<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\User;
use App\Models\About;
use App\Models\Category;
use App\Models\Welcome;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
	public function __construct(){
		$this->middleware('admin')->except(['showAdminLogin','adminLogin']);
	}
	
	public function dashboard(){
		return view('admin.dashboard')->with([
		'products' => Product::all(),
		'categories' => Category::all(),
		'orders' => Order::all(),
		'blogs' => Blog::all(),
		'users' => User::all(),
		'abouts' => About::all(),
		'galleries' => Gallery::all(),
		'welcomes' => Welcome::all(),
		]);
	}

	public function showAdminLogin(){
		return view('admin.auth.login');
	}
	
	public function adminLogin(){
		$this->validate(request(),[
		'email' => 'required',
		'password' => 'required',
		]);
		
		if (auth()->attempt(['email' => request()->email,'password' => request()->password],request()->get('Remember me'))){
			return redirect()->route('admin.index');
		}
			return redirect()->route('admin.login');
	}
	
	public function adminLogout(){
					auth()->logout();
					return redirect()->route('admin.login'); 
				}
				
	public function getProducts(){
		return view('admin.products.index')->with([
		'products' => Product::all(),
		'orders' => Order::all(),
		'categories' => Category::all(),
		]);
	}
	
	public function getOrders(){
		return view('admin.orders.index')->with([
		'orders' => Order::all(),
		'products' => Product::all(),
		
		]);
	}

}


