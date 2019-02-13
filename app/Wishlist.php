<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['userId','productid'];

    public function product(){
        return $this->belongsTo(app\Product);
    }

    public function user(){
        return $this->belongsTo(app\User);
    }
}
