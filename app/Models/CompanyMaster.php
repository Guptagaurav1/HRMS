<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMaster extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';
    protected $fillable = ['id','name','mobile','email','address','registration_no','gstin_no','sac_code','service_tax_registration_no','pan_no','website','bank_payee_name','bank_name','account_no','ifsc_code','branch_name','branch_address','company_city','payment_type','bank_email','twitter_link','facebook_link','linkedin_link','youtube_link','instagram_link','pinterest_link','status','user_id'];
    // public $timestamps = false;

}
