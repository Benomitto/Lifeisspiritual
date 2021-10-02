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
			'abouts'=>About::all(),
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
	
	
	
   	
    return view('/welcome')->with([
		'welcomes'=>Welcome::all(),
		'abouts'=>About::all(),
		'products'=>Product::all(),
		'videos' => Video::all(),
		'blogs' => $this->getBlogs(3),
		 'products' => $this->getProducts(4),
	]);
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
			'abouts'=>About::all(),
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
		$welcome = new Welcome;
		$welcome->intro = $request->input('intro');
		$welcome->descri = $request->input('descri');
		$welcome->introduction = $request->input('introduction');
		$welcome->descript = $request->input('descript');
		$welcome->description = $request->input('description');
		
		if($request->hasFile('image')){
			
			$file = $request->file('image');
			$extention = $file->getClientOriginalExtension();
			$filename = time().'.'.$extention;
			$file->move('images/slider/',$filename);
			$welcome->image = $filename;
		}
		
		$welcome->save();
		
		
		return redirect()->back()->with('status','Item Saved');
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
			$welcome->description = $request->input('description');
			
			if($request->hasFile('image'))
			{
				$destination = 'images/slider/'.$welcome->image;
				if(File::exists($destination)){
					File::delete($destination);
				}
				$file = $request->file('image');
				$extention = $file->getClientOriginalExtension();
				$filename = time().'.'.$extention;
				$file->move('images/slider/',$filename);
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
    public function destroy($id)
    {
        //
		$welcome = Welcome::findorFail($id);
		$welcome->delete();
		return redirect()->route('admin.welcome')->withSuccess("Item has been removed");
    }
}
