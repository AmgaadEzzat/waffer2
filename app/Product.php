<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  

        protected $fillable = [
        'productName', 'productPrice', 'productAddress', 'productDescription','productImage','like','dislike'
    ];

    public $table="products";
    public function category(){
        return $this->belongsTo(app\Category);
    }

    public function user(){
        return $this->belongsTo(app\User);
    }


    public function rating(){
        return $this->hasMany(app\Rating);
    }
    public function wishlist(){
        return $this->hasMany(app\Wishlist);
    }
}
