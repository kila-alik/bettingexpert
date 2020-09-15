<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['user_id', 'review', 'screenshot'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function scopeConfirmeds($query){
        return $query->where('confirmed', 1);
    }
}