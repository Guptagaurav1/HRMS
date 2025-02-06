<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpProfileRequestLog extends Model
{
    use HasFactory;


    /**
     * Get the column name.
     */
    public function changedColumn()
    {
        return $this->belongsTo(EmpChangedColumnsReq::class, 'changed_column', 'id')->select('name');
    }
    
}
