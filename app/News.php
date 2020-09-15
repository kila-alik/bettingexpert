<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'alias', 'text', 'keywords', 'description', 'image', 'created_at', 'updated_at', 'category_id'];

    public function category() {
        return $this->belongsTo('App\NewsCategory');
    }

}
