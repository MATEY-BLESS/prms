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

    // if an admin added patient
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    // Doctor(s) assigned to patient
    public function admins(){
        return $this->belongsToMany(Admin::class)
                    ->withTimestamps();
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
}
