<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeFinalization extends Model
{
    use HasFactory;
    protected $table = 'scope_finalizations';
    public function supervisor(){
        return $this->belongsTo(SuperVisorInformation::class,'supervisorinfoid ');
    }
    public function cosupervisor(){
        return $this->belongsTo(CoSuperVisorInformation::class,'cosupervisorinfoid ');
    }
    public function student(){
        return $this->belongsTo(StudentInformation::class,'stinfoid');
    }
    public function project(){
        return $this->belongsTo(ProjectRational::class);
    }
}
