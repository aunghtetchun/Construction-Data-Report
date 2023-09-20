<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
//        $data=Major::orderBy('day', 'ASC')->orderBy('time', 'ASC')->get()->groupBy('day');
        return view('admin-home');
    }
    public function manager()
    {
//        $data=Major::orderBy('day', 'ASC')->orderBy('time', 'ASC')->get()->groupBy('day');
        return view('manager-home');
    }


    public function sample(){
        return view('sample')->with("toast","I'm toast");
    }
}
