<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;
    protected $table = 'student_informations';
    public function scope()
    {
        return $this->hasMany(ScopeFinalization::class, 'stinfoid');
    }
}
