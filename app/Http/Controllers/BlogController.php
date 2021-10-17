<?php

namespace App\Http\Controllers;

use App\Models\Similiar;
use App\Models\Blog;

use App\Models\Comment;
use App\Models\Article;
use App\Models\Like;
use App\Models\Welcome;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function likes()
	{
			return $this->hasMany(Like::class);
	}
	
	
	public function getArticles($slug)
	{
		$article = Blog::where('slug', $slug)->first();
		$blog = Blog::where('slug', $slug)->first();
    return view('blogs.show')->with([
        'article' => $article,
		'blog' => $blog,
		
		
    ]);
	}
	
	
	
	function save_comment(Request $request,$id)
	{
		$request->validate([
			'comment'=>'required',
		]);
		$data = new Comment;
		$data->user_id=$request->user()->id;
		$data->blog_id=$id;
		$data->comment=$request->comment;
		$data->save();
		return back();
	}
	
	
	public function getBlog()
	{
		
		
		return view('admin.blog.index')->with([
			'blogs' => Blog::all(),
			
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
			$blog = new Blog;
			$blog->title = $request->input('title');
			$blog->date = $request->input('date');
			$blog->description = $request->input('description');
			$blog->slug = $request->input('slug');
			$blog->body = $request->input('body');
		
		if($request->hasFile('image')){
			
			$file = $request->file('image');
			$extention = $file->getClientOriginalExtension();
			$filename = time().'.'.$extention;
			$file->move('images/blogs/',$filename);
			$blog->image = $filename;
		}
		
		$blog->save();
		return redirect()->back()->with('status','Item Saved');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
       
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$blogs = Blog::find($id);
		return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
			$blog = Blog::findorFail($id);
			$blog->title = $request->input('title');
			$blog->date = $request->input('date');
			$blog->description = $request->input('description');
			$blog->slug = $request->input('slug');
			$blog->body = $request->input('body');
			
			if($request->hasFile('image'))
			{
				$destination = 'images/blogs/'.$blog->image;
				if(File::exists($destination)){
					File::delete($destination);
				}
				$file = $request->file('image');
				$extention = $file->getClientOriginalExtension();
				$filename = time().'.'.$extention;
				$file->move('images/blogs/',$filename);
				$blog->image = $filename;
				
			}
			$blog->update();
			return redirect()->route('admin.blog')->withSuccess("Item has been updated ");
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
		$image_path = public_path('images/blogs/').$blog->image;
		if(File::exists($image_path)){
			unlink($image_path);
		}
		$blog->delete();
		return redirect()->route('admin.blog')->withSuccess("Item has been removed");
    }
}
