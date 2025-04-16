<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecNomineeDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rec_id','family_member_name','relation_with_mem','aadhar_card_no','aadhar_card_doc','dob','stay_with_mem','dispensary_near_you','nominee'];
      
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
