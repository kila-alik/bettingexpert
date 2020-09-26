<?php

namespace Bett;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Forecast extends Model
{
    public function searchableAs()
    {
        return 'game';
    }

    protected $dates = ['date'];

    protected $casts = ['express'=>'array'];

    public function forecaster() {
        return $this->belongsTo('Bett\User');
    }

    public function sort(){
        return $this->belongsTo('Bett\Sort');
    }

    public function scopePastTime($query) {
        return $query->where('date', '<', Carbon::now());
    }

    public function scopeFree($query) {
        return $query->where('paid', 1);
    }

    public function scopePaid($query) {
        return $query->where('paid', 0);
    }

    public function scopeNotStatus($query) {
        return $query->where('status', 0);
    }

    public function scopeChecked($query){
        $forecast = $query->firstOrFail();

        if($forecast->date < Carbon::now() && $forecast->status === 0){
            return $query->where('id', 0);
        }

    }
}
