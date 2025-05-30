<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = ['id','city_name','city_code','state_code'];

}
