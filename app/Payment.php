<?php

namespace Bett;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    public function user()
    {
        return $this->belongsTo('Bett\User');
    }

    public function forecast()
    {
        return $this->belongsTo('Bett\Forecast');
    }

    public function scopeVerified($query) {
        return $query->where('sign', '!=', NULL);
    }
}
