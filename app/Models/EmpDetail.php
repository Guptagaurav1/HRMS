<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmpDetail extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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
        return $this->hasOne(EmpExperienceDetail::class, 'emp_code', 'emp_code')->select('emp_experience', 'emp_skills', 'resume_file');
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
        return $this->hasOne(EmpIdProof::class, 'emp_code', 'emp_code')->select('emp_passport_no', 'emp_aadhaar_no', 'bank_doc', 'nearest_police_station', 'police_verification_id', 'permanent_add_doc', 'category_doc', 'passport_file', 'police_verification_file', 'aadhar_card_doc');
    }

    /**
     * Get Personal Details.
     */ 
    public function getPersonalDetail(): HasOne{
        return $this->hasOne(EmpPersonalDetail::class, 'emp_code', 'emp_code')->select('emp_code','emp_dob','emp_dom');
    }

    /**
     * Get Address Details.
     */ 
    public function getAddressDetail(): HasOne{
        return $this->hasOne(EmpAddressDetail::class, 'emp_code', 'emp_code')->select('emp_permanent_address', 'emp_local_address', 'state', 'emp_city', 'pincode')->with('getState', 'getCity');
    }

    /**
     * Get Bank Details.
     */ 
    public function getBankDetail(): HasOne{
        return $this->hasOne(EmpAccountDetail::class, 'emp_code', 'emp_code')->select('bank_id', 'emp_account_no', 'emp_branch', 'emp_ifsc', 'emp_pan', 'emp_esi_no', 'emp_pf_no', 'emp_salary', 'emp_sal_structure_status', 'emp_unit')->with('getBankData');
    }

    public function woAttendance()
    {
        return $this->hasMany(WoAttendance::class, 'emp_id', 'id');
    }

    public function form16()
    {
        return $this->hasMany(Form16::class, 'emp_id', 'id');
    }

    /**
     * Get Certificate Details.
     */ 
    public function getCertificateDetail(): HasMany{
        return $this->hasMany(EmpCertificateDetail::class, 'emp_code', 'emp_code')->select('certificate_name', 'duration', 'grade');
    }

    /**
     * Check user has permission or not.
     */
    public function hasPermission($routeName)
    {
        $user = auth('employee')->user();
        if (!$user) {
            return false; 
        }
        $menu = Menu::where('page', $routeName)->first();
        if (!$menu) {
            return false; 
        }
        $role = Role::select('menu_id')->where('id', $user->role_id)->first();
        if (!$role || !$role->menu_id) {
            return false; // Role not found or no menu assigned
        }
        // Ensure we compare against menu IDs, not route names
        $menuIdExplode = explode(',', $role->menu_id);
        return in_array($menu->id, $menuIdExplode);
    
    }
}
