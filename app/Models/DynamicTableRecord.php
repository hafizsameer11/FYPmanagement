<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicTableRecord extends Model
{
    use HasFactory;
    protected $fillable = ['dynamic_table_id', 'records'];

    protected $casts = [
        'records' => 'array',
    ];

    public function dynamicTable()
    {
        return $this->belongsTo(DynamicTable::class);
    }
}
