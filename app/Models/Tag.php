<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships
    public function articles(){
        return $this->belongsToMany('App\Models\Article')
                    ->withTimestamps();
    }

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
}
