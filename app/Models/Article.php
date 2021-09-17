<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships
    public function categories(){
        return $this->belongsToMany('App\Models\Category')
                    ->withTimestamps();
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag')
                    ->withTimestamps();
    }

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function newsletters(){
        return $this->belongsToMany('App\Models\Newsletter')
                    ->withTimestamps();
    }

    public function seasonalmessages(){
        return $this->belongsToMany('App\Models\Seasonalmessage')
                    ->withTimestamps();
    }
}
