<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperVisorInformation extends Model
{
    use HasFactory;
    protected $table = 'super_visor_informations';
    public function scope()
    {
        return $this->hasMany(ScopeFinalization::class, 'supervisorinfoid');
    }
}
