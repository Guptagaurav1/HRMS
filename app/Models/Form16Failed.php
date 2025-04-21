<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form16Failed extends Model
{
    use HasFactory;
    protected $table = 'form_16_fails';


    protected $fillable = [
        'id','pan_no', 'financial_year', 'attachment', 'source','created_by','created_at'
    ];

    public function empDetail()
    {
        return $this->belongsTo(EmpDetail::class, 'emp_id', 'id');
    }
    

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
