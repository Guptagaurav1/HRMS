<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpSalarySlip extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_salary_slip';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'emp_salary_id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['emp_salary_id', 'work_order', 'sal_emp_code', 'wo_attendance_at_emp', 'sal_emp_name', 'sal_emp_email', 'sal_month', 'sal_pf_number', 'sal_working_days', 'sal_esi_number', 'sal_aadhar_no', 'sal_pan_no', 'sal_bank_name', 'sal_designation', 'sal_account_no', 'sal_uan_no', 'emp_sal_ctc', 'sal_basic', 'sal_hra', 'sal_conveyance', 'sal_medical_allowance', 'sal_special_allowance', 'sal_gross', 'sal_net', 'sal_pf_employee', 'sal_esi_employee', 'sal_recovery', 'sal_pf_wages', 'sal_esi_wages', 'sal_advance', 'sal_medical_insurance', 'sal_accident_insurance', 'tds_deduction', 'sal_tax', 'sal_medical_insurance_ctc', 'sal_accident_insurance_ctc', 'sal_group_medical', 'sal_total_deduction', 'sal_doj', 'total_overtime_allowance', 'sal_remarks', 'status', 'user_id'];

    /**
     * Save User id on CRUD operation.
     */
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
