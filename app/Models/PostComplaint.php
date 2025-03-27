<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoshComplaint extends Model
{
    use HasFactory, SoftDeletes;

   /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    /**
     * Get Employee Data
     */ 
    public function employee() : BelongsTo
    {
        return $this->belongsTo(EmpDetail::class, 'emp_id', 'id')->select('emp_code', 'emp_name');
    }
}
