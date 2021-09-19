<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function getBlog()
	{
		
		
		return view('admin.blog.index')->with([
			'blogs' => Blog::all(),
			'products' => Product::all(),
			'orders' => Order::all(),
		]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$products = Product::all();
		return view('/blog')->with([
			'blogs' => Blog::all(),
			
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
		return view('admin.blog.create')->with([
			'blogs' => Blog::all(),
			'products' => Blog::all(),
			'orders' => Order::all()
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
			'date' => 'required',
			'id' => 'required|numeric',
		]);
		if($request->hasFile('image')){
			$file = $request->image;
			$imageName = "images/blog/".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/blog/"),$imageName);
			$title = $request->title;
			Blog::create([
			'title' => $title,
			'date' => $request->date,
			'description' => $request->description,
			'image' => $imageName,
			'id' => $request->id,
			]);
			return redirect()->route('admin.blog')->withSuccess("Blog has been addedd ");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //return view('blog.show')->withBlog($blog);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
		return view('admin.blog.edit')->with([
			'blogs' => Blog::all(),
			'products' => Product::all(),
			'orders' => Order::all(),
			'blog' => $blog
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
			$this->validate($request,[
			'title' => 'required',
			'description' => 'required',
			'image' => 'image|mimes:png,jpg,jpeg|max: 4048',
			'date' => 'required|numeric',
			'id' => 'required|numeric',
		]);
		if($request->hasFile('image')){
			$image_path = public_path('images/blog/').$blog->image;
			if(File::exists($image_path)){
			unlink($image_path);
			}
			$file = $request->image;
			$imageName = "images/blog".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/blog/"),$imageName);
			$blog->image = $imageName;
			}
			$title = $request->title;
			$blog->update([
			'title' => $title,
			'date' => $request->date,
			'description' => $request->description,
			'image' => $blog->image,
			'id' => $request->id,
			
			]);
			return redirect()->route('admin.blog')->withSuccess("Blog has been updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
		$image_path = public_path('images/blog/').$blog->image;
		if(File::exists($image_path)){
			unlink($image_path);
		}
		$blog->delete();
		return redirect()->route('admin.blog')->withSuccess("Blog has been removed");
    }
}
