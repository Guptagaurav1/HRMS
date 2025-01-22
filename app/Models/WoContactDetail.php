<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoContactDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'wo_client_contact_person', 'wo_client_designation', 'wo_client_contact', 'wo_client_email', 'wo_client_remarks', 'workOrder_id'
    ];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}
