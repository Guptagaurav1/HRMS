<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoAttendance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wo_attendances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['wo_number', 'at_emp', 'emp_id', 'emp_code', 'attendance_month', 'approve_leave', 'lwp_leave', 'recovery', 'advance', 'overtime_rate', 'total_working_hrs', 'emp_vendor_rate', 'designation', 'ctc', 'remarks', 'attendance_status', 'status', 'user_id', 'updated_by'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    
    public function empDetail()
    {
        return $this->belongsTo(EmpDetail::class, 'emp_id', 'emp_id');
    }

    public static function boot()
    {
        parent::boot();
        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by = auth()->user()->id;
            });

            static::updating(function ($model) {
                $model->updated_by = auth()->user()->id;
            });

            static::deleting(function ($model) {
                $model->deleted_by = auth()->user()->id;
                $model->save();
            });
        }
        
    }

}
