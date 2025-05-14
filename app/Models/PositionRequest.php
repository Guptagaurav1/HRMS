<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PositionRequest extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','req_id', 'unique_id', 'recruitment_type', 'employment_type', 'position_title', 'client_name', 'department', 'functional_role', 'position_duration', 'state', 'city', 'date_notified', 'no_of_requirements', 'no_of_completed_requirements', 'jd_permission', 'requirement_status', 'job_description', 'remarks', 'education', 'experience', 'skill_sets', 'salary_range', 'attachment', 'status', 'position_type', 'employee_type', 'hiring_budget', 'budget_status', 'assigned_executive', 'read_status', 'created_by','updated_by','created_at','updated_at'];

    /**
     * Save User id on CRUD operation.
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

    /**
     * Get State.
     */ 
    public function getState(): BelongsTo{
        return $this->belongsTo(State::class, 'state', 'id')->select('state');
    }

    /**
     * Get City.
     */ 
    public function getCity(): BelongsTo{
        return $this->belongsTo(City::class, 'city', 'id')->select('city_name');
    }


    /**
     * Get Department.
     */ 
    public function getDepartment(): BelongsTo{
        return $this->belongsTo(Department::class, 'department', 'id')->select('department');
    }
}
