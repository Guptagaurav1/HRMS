<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmpDetail extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_details';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'emp_password'
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'emp_id';
    public function woAttendances()
    {
        return $this->hasMany(WoAttendance::class, 'emp_id', 'id');
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

    public function salary()
    {
        return $this->hasMany(Salary::class, 'sl_emp_id', 'id'); // Adjust the foreign keys as needed
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the experience associated with the user.
     */
    public function experience(): HasOne
    {
        return $this->hasOne(EmpExperienceDetail::class, 'emp_code', 'emp_code')->select('emp_experience', 'emp_skills');
    }

    /**
     * Get the education details associated with the user.
     */
    public function education(): HasOne
    {
        return $this->hasOne(EmpEducationDetail::class, 'emp_code', 'emp_code');
    }

    /**
     * Get ID Proofs Details.
     */ 
    public function getIdProofDetail(): HasOne{
        return $this->hasOne(EmpIdProof::class, 'emp_code', 'emp_code')->select('emp_passport_no', 'emp_aadhaar_no', 'bank_doc', 'nearest_police_station', 'police_verification_id');
    }

    /**
     * Get Personal Details.
     */ 
    public function getPersonalDetail(): HasOne{
        return $this->hasOne(EmpPersonalDetail::class, 'emp_code', 'emp_code');
    }

    /**
     * Get Address Details.
     */ 
    public function getAddressDetail(): HasOne{
        return $this->hasOne(EmpAddressDetail::class, 'emp_code', 'emp_code')->select('emp_permanent_address', 'emp_local_address');
    }

    /**
     * Get Bank Details.
     */ 
    public function getBankDetail(): HasOne{
        return $this->hasOne(EmpAccountDetail::class, 'emp_code', 'emp_code')->select('bank_id', 'emp_account_no', 'emp_branch', 'emp_ifsc', 'emp_pan', 'emp_esi_no', 'emp_pf_no', 'emp_salary', 'emp_sal_structure_status')->with('getBankData');
    }

    public function woAttendance()
    {
        return $this->hasMany(WoAttendance::class, 'emp_id', 'id');
    }
}
