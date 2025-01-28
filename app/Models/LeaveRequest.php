<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveRequest extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leave_request';

    /**
     * Customize the names of the columns used to store the timestamps.
     */ 
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';
}
