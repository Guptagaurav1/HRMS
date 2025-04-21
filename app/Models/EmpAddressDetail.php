<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmpAddressDetail extends Model
{
    use HasFactory, SoftDeletes;

    

    
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

    /**
     * Get State
     */
    public function getState(): BelongsTo{
        return $this->belongsTo(State::class, 'state', 'id')->select('state', 'id');
    }
    /**
     * Get City
     */
    public function getCity(): BelongsTo{
        return $this->belongsTo(City::class, 'emp_city', 'id')->select('city_name', 'id');
    }
}
