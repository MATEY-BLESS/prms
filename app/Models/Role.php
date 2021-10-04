<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // relationships
        // this admin() is to determine who added a role to the role table
        // public function admin(){
        //     return $this->belongsTo('App\Models\Admin');
        // }

        // this admins is for grouping admins by role
        public function admin(){
            return $this->hasMany('App\Models\Admin');
        }
}
