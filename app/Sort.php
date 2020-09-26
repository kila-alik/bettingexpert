<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    //
    protected $fillable = ['name','alias','icon'];


    public function forecasts()
    {
        return $this->hasMany('Bett\Forecast', 'sort_id');
    }
}
