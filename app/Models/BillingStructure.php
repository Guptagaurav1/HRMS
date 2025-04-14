<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingStructure extends Model
{
    use HasFactory;
    // protected $fillable = ['billing_to','billing_address','billing_gst_no','billing_state','contact_person','email_id','billing_sac_code','billing_tax_model','billing_tax_rate','show_service_charge','service_charge_rate'
    // ];
    protected $table = 'wo_billing_structure';

    public function organizations()
    {
        return $this->belongsTo(Organization::class,'organisation_id'); // Assuming 'organization_name' is a foreign key
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

       /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
