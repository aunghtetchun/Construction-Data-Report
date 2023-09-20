<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Report;
use App\User;
class LeaderController extends Controller
{
    public function createReport(){
        if(Report::where('created_at',Carbon::now())->where('leader_id',auth()->user()->id)->exists()){
            return abort(404);
        }else{
            return view('leader.create-report');
        }
        
    }
    public function storeReport(Request $request){
        $request->validate([
            'count' => 'required',
        ]);
        if(Report::where('created_at',Carbon::now())->where('leader_id',auth()->user()->id)->exists()){
        return abort(404);
        }else{
        $manager=User::find(auth()->user()->manager_id);
        $report = new Report();
        $report->leader_id = auth()->user()->id;
        $report->count = $request->count;
        $report->date = Carbon::now();
        $report->manager_id = $manager->id;
        $report->site_id =$manager->site_id;
        $report->save();
        return redirect()->route('home')->with('status', 'Report created successfully');
        }
    }
}
