<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class)
                    ->withTimestamps();
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
