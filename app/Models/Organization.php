<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Organization extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = ['name','address','contact','email','state_id','city_id','postal_code','psu','psu_name'];
    
    public function projects()
    {
        return $this->hasMany(Project::class);
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

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function BillingStructure()
    {
        return $this->hasMany(BillingStructure::class);
    }

    public function getState(){
        return $this->hasOne(State::class,'id','state_id');
    }

    public function getCity(){
        return $this->hasOne(City::class,'id','city_id');
    }

    

}
