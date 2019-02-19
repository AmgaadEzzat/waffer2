<?php

namespace App;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanFavorite;
use Overtrue\LaravelFollow\Traits\CanSubscribe;
use Overtrue\LaravelFollow\Traits\CanVote;
use Overtrue\LaravelFollow\Traits\CanBookmark;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use CanFollow, CanBookmark, CanLike, CanFavorite, CanSubscribe, CanVote,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'email', 'password','type','city','phone'
    ];

        public $table = "users";
    public function products(){
        return $this->hasMany(app\Product);
    }


    public function ratings(){
        return $this->hasMany(app\Rating);
    }

    public function wishlist(){
        return $this->hasMany(app\Wishlist);
    }
    public function review(){
        return $this->hasMany(app\Review);
    }
    public function deals(){
        return $this->hasMany(app\Deal);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
