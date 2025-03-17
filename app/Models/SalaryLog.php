<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryLog extends Model
{
    use HasFactory;

    protected $table = 'emp_salary_log';

    protected $fillable = ['salary_id', 'sal_emp_id', 'sal_emp_code', 'sal_emp_doj', 'sal_emp_name', 'sal_emp_designation', 'sal_ctc','sal_gross','taxable_salary','tds_tax_amount','tax_credit','e_cess','sal_net','sal_basic','sal_hra','sal_da','sal_conveyance','medical_allowance','sal_telephone','sal_uniform','sal_school_fee','sal_car_allow','sal_grade_pay','sal_special_allowance','sal_pf_employer','	sal_pf_employee','pf_exception','esi_exception','sal_esi_employer','sal_esi_employee','sal_lwf_employee','sal_lwf_employer','	medical_insurance','accident_insurance','medical_insurance_ctc','accident_insurance_ctc','	tds_deduction','pf_wages','sal_tax','sal_remark','sal_add_date','sal_entry_by'];

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
