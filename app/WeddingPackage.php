<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeddingPackage extends Model
{
    public function getPhoto()
    {
        return $this->hasMany('App\Photo',"wedding_package_id");
    }
    public function getRecommend()
    {
        return $this->hasMany('App\Recommend',"wedding_package_id");
    }
    public function getPackageDetail()
    {
        return $this->hasMany(PackageDetail::class,"wedding_package_id");
    }
}
