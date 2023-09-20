<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;

    // Other model properties and methods
    protected $dates = ['deleted_at'];

    public function getPhoto()
    {
        return $this->hasMany('App\Photo',"post_id");
    }
    public function getComment()
    {
        return $this->hasMany('App\Comment',"post_id");
    }
    public function getUser()
    {
        return $this->belongsTo('App\User',"worker_id");
    }
    public function getWork()
    {
        return $this->belongsTo('App\Information',"work");
    }
    public function getJob()
    {
        return $this->belongsTo('App\Information',"job");
    }
    public function getCity()
    {
        return $this->belongsTo('App\Information',"city");
    }
    public function getLocation()
    {
        return $this->belongsTo('App\Information',"location");
    }
}
