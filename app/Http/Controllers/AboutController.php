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
			$about = new About;
			$about->header = $request->input('header');
			$about->describe = $request->input('describe');
			$about->described = $request->input('described');
			$about->button = $request->input('button');
			
			if($request->hasFile('image')){
			
			$file = $request->file('image');
			$extention = $file->getClientOriginalExtension();
			$filename = time().'.'.$extention;
			$file->move('images/about/',$filename);
			$about->image = $filename;
		}
		
		$about->save();
		return redirect()->back()->with('status','Item Saved');
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
    public function edit(About $about,$id)
    {
        //
		
		$abouts = About::find($id);
		return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
		
		$about = About::find($id);
		$about->header = $request->input('header');
		$about->describe = $request->input('describe');
		$about->described = $request->input('described');
		$about->button = $request->input('button');
		
		if($request->hasFile('image'))
			{
				$destination = 'images/about/'.$about->image;
				if(File::exists($destination)){
					File::delete($destination);
				}
				$file = $request->file('image');
				$extention = $file->getClientOriginalExtension();
				$filename = time().'.'.$extention;
				$file->move('images/about/',$filename);
				$about->image = $filename;
			}
			
			$about->update();
			return redirect()->back()->with('status','Item Saved');
		

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$about = About::findorFail($id);
		$about->delete();
		return redirect()->route('admin.about')->withSuccess("Item has been removed");
    }
	
	
}
