<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentFormat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointment_format';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = ['id','name','format','format_2','type','employment_type','status'];

}
