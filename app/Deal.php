<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['Heading','Description','userId','Image','begin','end'];


    public function user(){
        return $this->belongsTo(app\User);
    }
    public $table = "deals";
}
