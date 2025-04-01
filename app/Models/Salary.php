<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salary';

    public function empDetail()
    {
        return $this->belongsTo(EmpDetail::class, 'sl_emp_id', 'id');
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


    public function woAttendance()
    {
        return $this->belongsTo(WoAttendance::class, 'sl_emp_code', 'emp_code');
    }

}
