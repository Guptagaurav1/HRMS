<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CrmActionLog extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Save record of login user on default events of model.
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


    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_user_id','id')->select('id','first_name','last_name');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by','id')->select('id','first_name','last_name');
    }
    

}
