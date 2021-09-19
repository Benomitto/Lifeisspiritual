<?php

namespace App\Http\Controllers;
use App\Models\Welcome;
use App\Models\Video;
use App\Models\Product;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     /*public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $welcomes = Welcome::all();
	$videos = Video::all();
	$blogs = $this->getBlogs(3);
    $products = $this->getProducts(4); 	 
    return view('/welcome',compact('welcomes','videos','blogs', 'products'));
    }
	
	public function getBlogs(int $limit) {
    return Blog::take($limit)->get();
	}
	
	public function getProducts(int $limit) {
    return Product::take($limit)->get();
	}
}
