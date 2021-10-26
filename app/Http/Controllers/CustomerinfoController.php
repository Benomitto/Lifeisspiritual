<?php

namespace App\Http\Controllers;
use App\Models\Customerinfo;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

use Illuminate\Http\Request;

class CustomerinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('customerinfo.customerinfo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		$customerinfo = new Customerinfo;
		$customerinfo->email = $request->input('email');
		$customerinfo->name = $request->input('name');
		$customerinfo->country = $request->input('country');
		$customerinfo->zipcode = $request->input('zipcode');
		$customerinfo->city = $request->input('city');
		$customerinfo->state = $request->input('state');
		$customerinfo->save();

        $userid = $customerinfo->id;
        $items = \Cart::getContent();
        // echo "<pre>";
        //  print_r($items);
        foreach($items as $item){
            $order = new Order;

            $productID = $item->id;
            $productName =  $item->name;
            $productQty =  $item->quantity;
            $productPrice =  $item->price;


            $order->product_name = $productName;
            $order->price = $productPrice;
            $order->total  = $productQty*$productPrice;
            $order->qty = $productQty;
            $order->delivered = 0;
            $order->user_id = $userid;
            $order->save();
			Mail::send(new OrderPlaced);
        }
        
		return redirect()->route('checkout')->withSuccess("Items have been updated ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
