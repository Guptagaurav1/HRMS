<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form16 extends Model
{
    use HasFactory;
    protected $table = 'form16';

    public function empDetail()
    {
        return $this->belongsTo(EmpDetail::class, 'emp_id', 'id');
    }
    protected $fillable = [
        'emp_id', 'pan_no', 'financial_year', 'attachment', 'source'
    ];

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
