<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getItem()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
    public function getManager()
    {
        return $this->belongsTo('App\User',"manager_id");
    }
    public function getSite()
    {
        return $this->belongsTo('App\Site',"site_id");
    }
}
