<?php

namespace App\Http\Controllers;
use App\Models\Welcome;
use App\Models\About;
use App\Models\Video;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
	
	public function getWelcome()
	{
		return view('admin.welcome.index')->with([
			'welcomes'=>Welcome::all(),
			'products' => Product::all(),
			'orders' => Order::all(),
			'blogs' => Blog::all(),
			'users' => User::all(),
		]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //Parameterized getblogs() which return only 3 blogs
	$welcomes = Welcome::all();
	$videos = Video::all();
	$blogs = $this->getBlogs(3);
    $products = $this->getProducts(4); 	 
    return view('/welcome',compact('welcomes','videos','blogs', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('admin.welcome.create')->with([
			'welcomes' => Welcome::all(),
			'products'=>Product::all(),
			'orders' => Order::all(),
		]);
		
    }
	
	public function getBlogs(int $limit) {
    return Blog::take($limit)->get();
	}
	
	public function getProducts(int $limit) {
    return Product::take($limit)->get();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
			$this->validate($request,[
			'intro' => 'required',
			'descri' => 'required',
			'introduction' => 'required',
			'descript' => 'required',
			'description' => 'required',
			'slider' => 'required|image|mimes:png,jpg,jpeg|max: 4048',
			'header' => 'required',
			'describe' => 'required',
			'described' => 'required',
			'image' => 'required|image|mimes:png,jpg,jpeg|max: 4048',
			'id' => 'required|numeric',
		]);
		if($request->hasFile('slider')){
			$file = $request->slider;
			$imageName = "images/welcome/".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/welcome/"),$imageName);
			$intro = $request->intro;
			$introduction = $request->introduction;
			Welcome::create([
			'intro' => $intro,
			'descri' => $request->description,
			'introduction' => $introduction,
			'descript' => $request->descript,
			'description' => $request->description,
			'slider' => $imageName,
			'header' => $request->header,
			'describe' => $request->describe,
			'described' => $request->described,
			'image' => $imageName,
			'id' => $request->id,
			]);
			return redirect()->route('admin.welcome')->withSuccess("Item has been addedd ");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(Welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$welcomes = Welcome::find($id);
		return view('admin.welcome.edit',compact('welcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
			
			$welcome = Welcome::find($id);
			$welcome->intro = $request->input('intro');
			$welcome->descri = $request->input('descri');
			$welcome->introduction = $request->input('introduction');
			$welcome->descript = $request->input('descript');
			$welcome->header = $request->input('header');
			
			if($request->hasFile('image'))
			{
				$destination = 'images/welcome/'.$welcome->image;
				if(File::exists($destination)){
					File::delete($destination);
				}
				$file = $request->file('image');
				$extention = $file->getClientOriginalExtension();
				$filename = time().'.'.$extention;
				$file->move('images/welcome/',$filename);
				$welcome->image = $filename;
				
			}
			$welcome->update();
			return redirect()->route('admin.welcome')->withSuccess("Item has been updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welcome $welcome)
    {
        //
		$image_path = public_path('images/welcome/').$welcome->image;
		if(File::exists($image_path)){
			unlink($image_path);
		}
		$welcome->delete();
		return redirect()->route('admin.welcome')->withSuccess("Item has been removed");
    }
}
