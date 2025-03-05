<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    

    

    public function contacts()
    {
        return $this->hasMany(WoContactDetail::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class); // Assuming 'project_id' is a foreign key
    }

    public function State()
    {
        return $this->belongsTo(State::class); // Assuming 'state_id' is a foreign key
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
