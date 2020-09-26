<?php

namespace Bett;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use MongoDB\Driver\Query;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'is_forecaster', 'information', 'sort_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function forecastsForecaster() {
        return $this->hasMany('Bett\Forecast','forecaster_id');
    }

    public function scopeIsForecaster($query, $is_forecaster = 0)
    {
        return $query->where('is_forecaster', $is_forecaster);
    }

    public function sort() {
        return $this->hasOne('Bett\Sort', 'id', 'sort_id');
    }

    public function forecasts()
    {
        return $this->belongsToMany('Bett\Forecast');
    }

    public function reviews()
    {
        return $this->hasMany('Bett\Review', 'user_id');
    }

    public function payments(){
        return $this->hasMany('Bett\Payment');
    }
}
