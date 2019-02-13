<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = [
        'like','dislike','userId','productid'];



    public function product(){
        return $this->belongsTo(app\Product);
    }

    public function user(){
        return $this->belongsTo(app\User);
    }
}
