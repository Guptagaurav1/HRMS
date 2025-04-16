<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecPreviousCompany extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rec_id','company_name','technologies_worked_in','projects_worked_in','designation','salary_ctc','take_home_salary','last_3months_sal_slip_doc','3months_bank_stat_doc','doc_type','doc_file','start_date','end_date','created_at','updated_at'];
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
