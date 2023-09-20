<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getUser()
    {
        return $this->belongsTo('App\User',"user_id");
    }
    public function getPost()
    {
        return $this->belongsTo('App\Post',"post_id");
    }
    public function getWorker()
    {
        return $this->belongsTo('App\User',"worker_id");
    }
}
