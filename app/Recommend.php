<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{

    public function getWorker()
    {
        return $this->belongsTo('App\User',"worker_id");
    }
    public function getUser()
    {
        return $this->belongsTo('App\User',"user_id");
    }
}
