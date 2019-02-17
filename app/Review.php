<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['Comment','userId','productid'];

    public function product(){
        return $this->belongsTo(app\Product);
    }

    public function user(){
        return $this->belongsTo(app\User);
    }
    public $table = "reviws";
}
