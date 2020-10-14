<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title','image','description','news_category_id'
    ];

    protected $with = [
        'news_category'
    ];
    public function news_category(){
        return $this->belongsTo('App\NewsCategory','news_category_id');
    }
}
