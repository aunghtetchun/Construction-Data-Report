<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','city','job','location','work','nrc','address','bio','count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getWork()
    {
        return $this->belongsTo('App\Information',"work");
    }
    public function getSite()
    {
        return $this->belongsTo('App\Site',"site_id");
    }
    public function getJob()
    {
        return $this->belongsTo('App\SubCategory',"job");
    }
    public function getCity()
    {
        return $this->belongsTo('App\Information',"city");
    }
    public function getLocation()
    {
        return $this->belongsTo('App\SubCategory',"location");
    }
}
