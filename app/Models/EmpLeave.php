<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpLeave extends Model
{
    use HasFactory;

    protected $table = 'emp_leaves';
    public $timestamps = false; // Assuming no timestamps in the table
    protected $fillable = [
        'emp_code', 'month_id', 'year',
        'casual_leave', 'privilege_leave',
        'carry_forward_cl', 'carry_forward_pl',
        'leave_taken'
    ];

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id', 'id');
    }
}
