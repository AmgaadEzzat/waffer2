<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = [
        'categoryName',
    ];


    public $table = "categories";
    public function products(){
        return $this->hasMany(app\Product);
    }
}
