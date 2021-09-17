<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seasonalmessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationshps
    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function articles(){
        return $this->belongsToMany('App\Models\Article')
                    ->withTimestamps();
    }

}
