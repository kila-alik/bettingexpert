<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    //
    protected $fillable = ['name','alias','icon'];


    public function forecasts()
    {
        return $this->hasMany('App\Forecast', 'sort_id');
    }
}
