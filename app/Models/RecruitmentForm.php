<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
class RecruitmentForm extends Model
{
    use HasFactory, SoftDeletes;

// protected $fillable = ['id','send_mail_id','pos_req_id','department','recruitment_type','employment_type','gender','relative_name','relation','district','state','pincode','scope_of_work','candidate_address','firstname','lastname','job_position','dob','location','education','experience','skill','email','phone','resume','status','stage1','stage2','stage3','stage4','stage5','stage6','finally','reference','reference_name','salary','fixed','variable','emp_code','others','read_status','remarks_first_round','remarks_second_round','remarks_for_backout','offer_letter','doj','other_skills','rec_form_status','	recruitment_status','created_at','updated_at'];
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

    /**
     * Get State.
     */ 
    public function getState(): BelongsTo{
        return $this->belongsTo(State::class, 'state', 'id')->select('state');
    }

    /**
     * Get District Name.
     */ 
    public function getDistrict(): BelongsTo{
        return $this->belongsTo(District::class, 'district', 'id')->select('district_name');
    }

    /**
     * Get Personal Details.
     */ 
    public function getPersonalDetail(): HasOne{
        // return $this->hasOne(RecPersonalDetail::class, 'rec_id', 'id');
        return $this->hasOne(EmpPersonalDetail::class, 'rec_id', 'id');
    }

    /**
     * Get Address Details.
     */ 
    public function getAddressDetail(): HasOne{
        // return $this->hasOne(RecAddressDetail::class, 'rec_id', 'id')->select('permanent_add', 'correspondence_add');
        return $this->hasOne(EmpAddressDetail::class, 'rec_id', 'id')->select('emp_permanent_address', 'emp_local_address', 'state', 'emp_city', 'pincode');
    }

    /**
     * Get Bank Details.
     */ 
    public function getBankDetail(): HasOne{
        // return $this->hasOne(RecBankDetail::class, 'rec_id', 'id')->select('bank_name_id', 'account_no', 'branch', 'ifsc_code', 'pan_card_no')->with('getBankData');
        return $this->hasOne(EmpAccountDetail::class, 'rec_id', 'id')->select('bank_id', 'emp_account_no', 'emp_branch', 'emp_ifsc', 'emp_pan', 'emp_esi_no', 'emp_pf_no', 'emp_salary')->with('getBankData');
    }

    /**
     * Get Educational Details.
     */ 
    public function getEducationDetail(): HasOne{
        // return $this->hasOne(RecEducationalDetail::class, 'rec_id', 'id');
        return $this->hasOne(EmpEducationDetail::class, 'rec_id', 'id');
    }

    /**
     * Get Previous Company Details.
     */ 
    public function getCompanyDetail(): HasOne{
        return $this->hasOne(RecPreviousCompany::class, 'rec_id', 'id');
    }

    /**
     * Get Nominee Details.
     */ 
    public function getNomineeDetail(): HasMany{
        return $this->hasMany(RecNomineeDetail::class, 'rec_id', 'id');
    }

    /**
     * Get ESI Details.
     */ 
    // public function getEsiDetail(): hasOne{
    //     return $this->hasOne(RecEsiDetail::class, 'rec_id', 'id')->select('previous_esi_no');
    // }

    /**
     * Get Position Request Details.
     */ 
    public function getPositionDetail(): BelongsTo{
        return $this->belongsTo(PositionRequest::class, 'pos_req_id', 'req_id')->select('position_title', 'client_name');
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get ID Proofs Details.
     */ 
    public function getIdProofDetail(): HasOne{
        return $this->hasOne(EmpIdProof::class, 'rec_id', 'id')->select('emp_passport_no', 'emp_aadhaar_no', 'bank_doc', 'nearest_police_station', 'police_verification_id', 'permanent_add_doc', 'category_doc', 'passport_file', 'police_verification_file', 'aadhar_card_doc');
    }
    
}
