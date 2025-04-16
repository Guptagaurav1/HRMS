<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecPersonalDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rec_id','emp_code','gender','preferred_location','father_name','father_mobile','marital_status','spouse_name','date_of_marriage','blood_group','pf_no','photograph','signature','language_known','aadhar_card_no','aadhar_card_doc','passport_no','passport_doc','category','category_doc','police_verification_id','police_verification_doc','nearest_police_station','status'];

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
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
