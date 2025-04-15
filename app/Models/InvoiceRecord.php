<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceRecord extends Model
{
    use HasFactory;

    protected $fillable = ['id','ir_invoice_number','ir_wo','ir_month','ir_sub_total','ir_gst_mode','gst_rate','gst_value','show_service_charge','service_charge_rate','service_charge_value','r_grand_total','ir_add_datetime','user_id','status'];
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
