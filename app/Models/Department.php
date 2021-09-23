<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // relationships

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
}
