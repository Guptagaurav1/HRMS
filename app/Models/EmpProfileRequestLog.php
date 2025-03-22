<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpProfileRequestLog extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * Get the column name.
     */
    public function changedColumn()
    {
        return $this->belongsTo(EmpChangedColumnsReq::class, 'changed_column', 'id')->select('name');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['req_id', 'emp_code', 'description', 'file', 'changed_column', 'assigned_to', 'status'];

    /**
     * Update details on CRUD.
     *
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
}
