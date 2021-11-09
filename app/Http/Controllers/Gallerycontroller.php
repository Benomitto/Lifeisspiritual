<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Gallerycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
             return view('/gallery')->with([
                'galleries' => Gallery::all(),
    ]);
    
    }
      public function getGallery()
    {
        return view('admin.gallery.index')->with([
        'galleries' => Gallery::all(),
        
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
        return view('admin.gallery.create')->with([
            'galleries' => Gallery::all(),
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
        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
       
        
        
         $validatedData = $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,gif,png|max:8000'
        ]);

        $images=array();
        if($files=$request->file('image')){
            //if file present
            $count = count($files);
            $i = 1;
            $imagesNames = "";
            foreach($files as $file){
//                $name=$file->getClientOriginalName();
                $name = time().'.'.$file->getClientOriginalName();
                $file->move('images/gallery',$name);
                //$images[]=$name;

                //Image::insert( ['images/gallery'=> $name]);
                if ($i<$count) {
                    $imagesNames.=$name.'|';
                }else{
                    $imagesNames.=$name;
                }
                $i++;
                //$gallery->save();

            }
        }
        $gallery->image = $imagesNames;

        $gallery->save();
        return redirect()->back()->with('status','Item Saved');

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
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit',compact('welcome'));
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
        $gallery = Gallery::findorFail($id);
        $gallery->delete();
        return redirect()->route('admin.gallery')->withSuccess("Item has been removed");
    }
}
