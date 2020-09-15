<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $fillable = ['name', 'alias'];

    public function news() {
        return $this->hasMany('App\News', 'category_id', 'id');
    }
}
