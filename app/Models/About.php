<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationship
    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

}
