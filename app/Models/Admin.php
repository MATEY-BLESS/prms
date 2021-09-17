<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // relationships
    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    public function categories(){
        return $this->hasMany('App\Models\Category');
    }

    public function tags(){
        return $this->hasMany('App\Models\Tag');
    }

    public function about(){
        return $this->hasMany('App\Models\About');
    }

    public function roles(){
        return $this->hasMany('App\Models\Role');
    }

    public function newsletter(){
        return $this->hasMany('App\Models\Newsletter');
    }

    public function seasonalmessages(){
        return $this->hasMany('App\Models\Seasonalmessage');
    }

}
