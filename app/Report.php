<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function getLeader()
    {
        return $this->belongsTo('App\User',"leader_id");
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
