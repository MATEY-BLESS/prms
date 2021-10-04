<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function patients(){
        return $this->belongsToMany(Patient::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
