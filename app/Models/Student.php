<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function meeting(){
        return $this->hasMany(Meeting::class);
    }
    public function task(){
        return $this->hasMany(Meeting::class);
    }
    public function document(){
        return $this->hasMany(Meeting::class);
    }

}
