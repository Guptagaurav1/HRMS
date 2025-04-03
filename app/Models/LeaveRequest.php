<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'leave_requests';
    public $timestamps = false; 

    protected $fillable = [
        'emp_code', 'total_days', 'absence_dates',
        'created_on', 'status', 'reason_for_absence','year',
    ];
    
}
