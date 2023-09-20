<?php

namespace App\Http\Controllers;

use App\Recommend;
use Illuminate\Http\Request;

class RecommendController extends Controller
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
        $recommends=Recommend::latest()->get();
        return view('recommend.index',compact('recommends'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Recommend  $recommend
     * @return \Illuminate\Http\Response
     */
    public function show(Recommend $recommend)
    {
        return view('recommend.show',compact('recommend'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recommend  $recommend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recommend $recommend)
    {
        $recommend->delete();
        return redirect()->route("recommend.index")->with("toast","Recommend Delete Successful");
    }
}
