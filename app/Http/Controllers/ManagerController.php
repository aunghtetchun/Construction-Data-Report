<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Report;
use App\Order;
use Carbon\Carbon;


class ManagerController extends Controller
{
    public function getLeader(){
        $leaders=User::where('role','leader')->where('manager_id',auth()->user()->id)->get();
        return view('manager.leader-list',compact('leaders'));
    }
    public function getOrder(){
        $orders = Order::where('manager_id',auth()->user()->id)->get();
        return view('manager.order-list',compact('orders'));
    }
    public function createOrder(){
        $items = Item::all();
        return view('manager.create-order', compact('items'));
    
    }
    public function storeOrder(Request $request){
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'count' => 'required',
        ]);

        $order = new Order();
        $order->item_id = $request->item_id;
        $order->count = $request->count;
        $order->date = Carbon::now();
        $order->manager_id = auth()->user()->id;
        $order->site_id = auth()->user()->site_id;
        $order->save();

        return redirect()->route('manager.getOrder')->with('status', 'Order created successfully');
    }
    public function editOrder($id){
        $items = Item::all();
        $orders = Order::find($id);
        return view('manager.edit-order', compact('items','orders'));
    }
    public function updateOrder(Request $request, $id){
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'count' => 'required',
        ]);
        $order = Order::where('manager_id',auth()->user()->id)->find($id);
        $order->item_id = $request->item_id;
        $order->count = $request->count;
        $order->manager_id = auth()->user()->id;
        $order->site_id = auth()->user()->site_id;
        if($order->status == 'waiting'){
        $order->update();
        }
        return redirect()->route('manager.getOrder')->with('status', 'Order updated successfully');
    }
    public function deleteOrder($id){
        $order = Order::find($id);
        if($order->status == 'waiting'){
        $order->delete();
        }
        return redirect()->route('manager.getOrder')->with('status', 'Order deleted successfully');
    }
    public function getReport(){
        $reports=Report::where('manager_id', auth()->user()->id)->latest()->get();
        return view('manager.report-list',compact('reports'));
    }
    public function approve($id){
       $report=Report::find($id);
       $report->status="approved";
       $report->update();
       return redirect()->route('manager.getReport')->with('status', 'Report Approved successfully');
    }
    public function reject($id){
        $report=Report::find($id);
        $report->delete();
        return redirect()->route('manager.getReport')->with('status', 'Report Reject successfully');
     }
}
