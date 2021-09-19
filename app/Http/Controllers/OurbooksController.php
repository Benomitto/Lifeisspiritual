<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Http\Request;

class OurbooksController extends Controller
{
    //
	 public function ourbooks()
    {
		
        return view('/ourbooks')->with([
		'products' => Product::latest()->paginate(6),
		'categories' => Category::has('products')->get()
		]);;
    }
	
	public function getCategoryProducts(Category $category)
    {
		$products = $category->products()->paginate(6);
        return view('/ourbooks')->with([
		'products' => $products,
		'categories'=>Category::all(),
		'categories' => Category::has('products')->get()
		]);
    }
	
	public function transactions()
    {
        $trans = Transaction::latest()->get();
       
        return view('admin.transaction.index', compact('trans'));
    }
	
	public function payments()
    {
        //
		$pays = Payment::latest()->get();
		return view('admin.payments.index', compact('pays'));
    }
	
}
