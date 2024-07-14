<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRational extends Model
{
    use HasFactory;
    public function scope()
    {
        return $this->hasMany(ScopeFinalization::class, 'project_id');
    }
}
