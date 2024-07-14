<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSuperVisorInformation extends Model
{
    use HasFactory;
    protected $table = 'co_super_visor_informations';
    public function scope()
    {
        return $this->hasMany(ScopeFinalization::class, 'cosupervisorinfoid ');
    }
}
