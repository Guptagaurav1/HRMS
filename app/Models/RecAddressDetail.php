<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecAddressDetail extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = ['id','rec_id','permanent_add','per_doc_type','permanent_add_doc','correspondence_add','corres_doc_type','correspondence_add_doc','created_at','updated_at'];
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
