<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
