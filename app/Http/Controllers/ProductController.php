<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct(){
		$this->middleware('admin')->except(['index','show']);
	} 
	
    public function index()
    {
        //
		 return view('/ourbooks')->with([
		'products' => Product::all(),
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
		return view('admin.products.create')->with([
			'categories' => Category::all(),
			'products' => Product::all(),
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
			'price' => 'required|numeric',
			'category_id' => 'required|numeric',
		]);
		if($request->hasFile('image')){
			$file = $request->image;
			$imageName = "images/products/".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/products/"),$imageName);
			$title = $request->title;
			Product::create([
			'title' => $title,
			'slug' => Str::slug($title),
			'description' => $request->description,
			'image' => $imageName,
			'price' => $request->price,
			'old_price' => $request->old_price,
			'inStock' => $request->inStock,
			'category_id' => $request->category_id,
			]);
			return redirect()->route('admin.products')->withSuccess("Product has been addedd ");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
		

		return view('products.show')->with([
			'categories' => Category::all(),
			'products' => Product::all(),
			'product' => $product
			
		]);
    }
	
	public function getCategory()
    {
		return $this->belongsTo(Category::class, 'category_id','id');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
		return view('admin.products.edit')->with([
			'categories' => Category::all(),
			'products' => Product::all(),
			'orders' => Order::all(),
			'product' => $product
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
		$this->validate($request,[
			'title' => 'required',
			'description' => 'required',
			'image' => 'image|mimes:png,jpg,jpeg|max: 4048',
			'price' => 'required|numeric',
			'category_id' => 'required|numeric',
		]);
		if($request->hasFile('image')){
			$image_path = public_path('images/products/').$product->image;
			if(File::exists($image_path)){
			unlink($image_path);
			}
			$file = $request->image;
			$imageName = "images/products".time()."_".$file->getClientOriginalName();
			$file->move(public_path("images/products/"),$imageName);
			$product->image = $imageName;
			}
			$title = $request->title;
			$product->update([
			'title' => $title,
			'slug' => Str::slug($title),
			'description' => $request->description,
			'image' => $product->image,
			'price' => $request->price,
			'old_price' => $request->old_price,
			'inStock' => $request->inStock,
			'category_id' => $request->category_id,
			
			]);
			return redirect()->route('admin.products')->withSuccess("Product has been updated ");

		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
		$image_path = public_path('images/products/').$product->image;
		if(File::exists($image_path)){
			unlink($image_path);
		}
		$product->delete();
		return redirect()->route('admin.products')->withSuccess("Item has been removed");
    }
    
}
