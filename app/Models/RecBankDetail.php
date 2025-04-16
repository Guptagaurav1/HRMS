<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecBankDetail extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = ['id','rec_id','bank_name_id','account_no','branch','ifsc_code','bank_doc','pan_card_no','pan_card_doc','created_at','updated_at'];

    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get Bank Details.
     */ 
    public function getBankData(): BelongsTo{
        return $this->belongsTo(Bank::class, 'bank_name_id', 'id');
    }
}
