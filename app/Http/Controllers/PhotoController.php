<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//        return $request;
        $request->validate([
            "wedding_package_id" => "required|numeric",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('images')){
            $dir="public/wedding_package";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_wedding_package.".$image->getClientOriginalExtension();
                $image->storeAs($dir,$newName);
                $photo=new Photo();
                $photo->name=$newName;
                $photo->wedding_package_id=$request->wedding_package_id;
                $photo->save();
            }
        }
        return redirect()->back()->with("toast","Photo Upload Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->back()->with("toast","Photo Delete Successful");
    }
}
