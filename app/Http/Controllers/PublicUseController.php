<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;

class PublicUseController extends Controller
{
    public function getTownships(Request $request)
    {
        $cityId = $request->input('city_id');
        $townships = SubCategory::where('type', 'location')->where('information_id', $cityId)->get();
        return response()->json($townships);
    }
    public function getJobs(Request $request)
    {
        $workId = $request->input('work_id');
        $jobs = SubCategory::where('type', 'job')->where('information_id', $workId)->get();
        return response()->json($jobs);
    }
}
