<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'site_id',
        'item_id',
        'count',
        // Add more attributes here
    ];
    protected $table = 'targets';

    public static function getTargetsWithSum($id)
    {
        return $targets = Target::where('targets.site_id', $id)
        ->select('targets.*', 'order_totals.total_count')
        ->leftJoin(DB::raw('(SELECT item_id, site_id, SUM(count) as total_count FROM orders GROUP BY item_id, site_id) as order_totals'), function($join) {
            $join->on('targets.item_id', '=', 'order_totals.item_id')
                ->on('targets.site_id', '=', 'order_totals.site_id');
        })
        ->get();
    }
    public function getSite()
    {
        return $this->belongsTo('App\Site',"site_id");
    }
    public function getItem()
    {
        return $this->belongsTo('App\Item',"item_id");
    }
}
