<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRequestLog extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','req_id', 'user_id', 'query_type', 'description', 'job_position', 'status', 'ref_table_name', 'ref_table_id', 'status_changed_to', 'change_offer_letter'];

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
     * Get user data.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('first_name', 'last_name', 'email');
    } 
}
