<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class AboutController extends Controller
{
	
	public function getAbout()
	{
		
		return view('admin.about.index')->with([
		'abouts' => About::all(),
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
{
    
    return view('/about')->with([
		'abouts' => About::all(),
		
		
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
		
		
		return view('admin.about.create')->with([
		'orders' => Order::all(),
		'products' => Product::all(),
		'abouts' => About::all(),
		]);
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
			'title' => 'required',
			'description' => 'required',
			'image' => 'required|image|mimes:png,jpg,jpeg|max: 4048',
			'sentence' => 'required',
		]);
		if($request->hasFile('image')){
			$file = $request->image;
			$imageName = "images/products/".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/products/"),$imageName);
			$title = $request->title;
			About::create([
			'title' => $title,
			'description' => $request->description,
			'sentence' => $request->sentence,
			'image' => $imageName,
			
			]);
			return redirect()->route('admin.about')->withSuccess("Item has been addedd ");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
		
		return view('admin.about.edit')->with([
			'abouts' => About::all(),
			'products' => Product::all(),
			'orders' => Order::all(),
			'about' => $about
			
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
		$this->validate($request,[
			'title' => 'required',
			'description' => 'required',
			'sentence' => 'required',
			'image' => 'image|mimes:png,jpg,jpeg|max: 4048',
			"photo" => 'required',
			'paragraph' => 'required',
			'segment' => 'required',
			
		]);
		if($request->hasFile('image')){
			$image_path = public_path('images/abouts/').$about->image;
			if(File::exists($image_path)){
			unlink($image_path);
			}
			$file = $request->image;
			$imageName = "images/abouts".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/abouts/"),$imageName);
			$about->image = $imageName;
			}
			$title = $request->title;
			$about->update([
			'title' => $title,
			'description' => $request->description,
			'sentence' => $request->sentence,
			'image' => $about->image,
			"photo" => 'required',
			'paragraph' => 'required',
			'segment' => 'required',
			'id'=>$request->id,
			
			
			
			]);
			return redirect()->route('admin.about')->withSuccess("About page has been updated ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
			$image_path = public_path('images/abouts/').$about->image;
		if(File::exists($image_path)){
			unlink($image_path);
		}
		$about->delete();
		return redirect()->back()->withSuccess("Item has been deleted");
    }
	
	
}
