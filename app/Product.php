<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    *Contains the fillable criteria of the model
    */
    protected $fillable = [
        'name','refNumber','description','image','category_id'
    ];
    protected $with = [
        'category'
    ];

    public function getPrice(){
        $price = $this->price/100;
        return number_format($price,2,',','').' €';
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
