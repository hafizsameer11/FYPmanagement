<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;
    protected $table = 'supervisors';
    public function user(){
        return $this->belongsTo(User::class);
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
    public function supervisor(){
        return $this->hasMany(Student::class);
    }
    // public function project(){
    //     return $this->hasMany(Project::class);
    // }
    public function student(){
        return $this->hasMany(Student::class);
    }
}
