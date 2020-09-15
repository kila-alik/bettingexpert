<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function forecast()
    {
        return $this->belongsTo('App\Forecast');
    }

    public function scopeVerified($query) {
        return $query->where('sign', '!=', NULL);
    }
}
