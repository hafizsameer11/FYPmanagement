<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicTable extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'headers'];

    protected $casts = [
        'headers' => 'array',
    ];

    public function records()
    {
        return $this->hasMany(DynamicTableRecord::class);
    }
}
