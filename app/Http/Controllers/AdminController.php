<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Site;
use App\Report;
use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function managerList()
    {
        $managers=User::where('role','manager')->get();
        return view('admin.manager-list',compact('managers'));
    }
    public function leaderList()
    {
        $leaders=User::where('role','leader')->get();
        return view('admin.leader-list',compact('leaders'));
    }
    public function createManager(){
        $sites=Site::get();
        return view('admin.create-manager',compact('sites'));
    }   
    public function storeManager(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'site_id' => 'required|exists:sites,id',
            'address' => 'required',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->site_id = $request->site_id;
        $user->address = $request->address;
        $user->role = 'manager'; // Default role
        $user->save();

        return redirect()->route('admin.createManager')->with('status', 'Manager created successfully');
    
    }
    public function editManager($id){
        $sites = Site::get();
        $user = User::find($id);
        return view('admin.edit-manager', compact('sites','user'));
    }
    public function updateManager(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'site_id' => 'required|exists:sites,id',
            'address' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password); // Hash the password
        }
        $user->site_id = $request->site_id;
        $user->address = $request->address;
        $user->update();

        return redirect()->route('admin.managerList')->with('status', 'Manager updated successfully');
    }
    public function reportList(){
        return view('admin.report-list');
    }
    
    public function getReport(Request $request){
        $from = date_create($request->start);
        $to = date_create($request->end);
        $manager_id=$request->manager_id;
        if($manager_id=="all"){
            $data= Report::whereBetween('created_at', [$from, $to])->with('getManager')->with('getSite')->with('getLeader')->get();
        }else{
        $data= Report::whereBetween('created_at', [$from, $to])->where('manager_id',$manager_id)->with('getManager')->with('getSite')->with('getLeader')->get();
        }
        return response()->json($data);
    }
    public function getOrder(Request $request){
        $from = date_create($request->start);
        $to = date_create($request->end);
        $manager_id=$request->manager_id;
        if($manager_id=="all"){
            $data= Order::whereBetween('created_at', [$from, $to])->with('getManager')->with('getSite')->with('getItem')->get();
        }else{
        $data= Order::whereBetween('created_at', [$from, $to])->where('manager_id',$manager_id)->with('getManager')->with('getSite')->with('getItem')->get();
        }
        return response()->json($data);
    }
    public function approveOrder(Request $request){
        $id=$request->id;
        $status=$request->status;
        $order=Order::where('status','waiting')->where('id',$id)->first();
        if($status=="reject"){
            $order->delete();
        }else{
            $order->status=$status;
            $order->admin_id=auth()->user()->id;
            $order->update();
        }        
        return response()->json(['message' => 'status'], 200);
    }
    public function deleteManager($id){

    }
    public function createLeader(){
        $managers = User::where('role', 'manager')->get();
        return view('admin.create-leader', compact('managers'));

    }   
    public function storeLeader(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'manager_id' => 'required|exists:users,id,role,manager',
            'address' => 'required',
            'label_one' => 'required',
            'label_two' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->manager_id = $request->manager_id;
        $user->address = $request->address;
        $user->role = 'leader';
        $user->label_one = $request->label_one;
        $user->label_two = $request->label_two;
        $user->save();

        return redirect()->route('admin.createLeader')->with('status', 'User created successfully');
    }
    public function editLeader($id){
        $managers = User::where('role', 'manager')->get();
        $user = User::find($id);
        return view('admin.edit-leader', compact('managers','user'));
    }
    public function updateLeader(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'label_one' => 'required',
            'label_two' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->label_one = $request->label_one;
        $user->label_two = $request->label_two;
        $user->update();
        return redirect()->route('admin.leaderList')->with('status', 'User updated successfully');
    }
    public function deleteLeader($id){

    }
    
    public function orderList(){
        return view('admin.order-list');
    }
}
