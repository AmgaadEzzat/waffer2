<?php


namespace App;


use Overtrue\LaravelFollow\Traits\CanBeLiked;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use CanBeLiked;
    protected $fillable = ['title'];
}
