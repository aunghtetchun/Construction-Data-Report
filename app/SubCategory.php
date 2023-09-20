<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function getCity()
    {
        return $this->belongsTo('App\Information',"information_id");
    }
    public function getWork()
    {
        return $this->belongsTo('App\Information',"information_id");
    }
}
