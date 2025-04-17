<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form16 extends Model
{
    use HasFactory;
    protected $table = 'form16';
    protected $fillable = [
        'id','emp_id', 'pan_no', 'financial_year','attachment', 'source','created_by','created_at'
    ];


    public function empDetail()
    {
        return $this->belongsTo(EmpDetail::class, 'emp_id', 'id');
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

    public function getBankDetail(): HasOne{
        return $this->hasOne(EmpAccountDetail::class, 'emp_code', 'emp_code')->select('bank_id', 'emp_account_no', 'emp_branch', 'emp_ifsc', 'emp_pan', 'emp_esi_no', 'emp_pf_no', 'emp_salary', 'emp_sal_structure_status')->with('getBankData');
    }
}
