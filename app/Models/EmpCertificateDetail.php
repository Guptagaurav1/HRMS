<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpCertificateDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Save User id on CRUD operation.
     */
    public static function boot()
    {
        parent::boot();
        if (auth('employee')->check()) {
            static::creating(function ($model) {
                $model->created_by = auth('employee')->user()->id;
            });

            static::updating(function ($model) {
                $model->updated_by = auth('employee')->user()->id;
            });

            static::deleting(function ($model) {
                $model->deleted_by = auth('employee')->user()->id;
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
