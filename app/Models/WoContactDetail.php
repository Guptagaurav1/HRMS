<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoContactDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'wo_client_contact_person', 'wo_client_designation', 'wo_client_contact', 'wo_client_email', 'wo_client_remarks', 'work_order_id'
    ];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
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
