<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';
    protected $fillable =['id','department','created_at'];


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
    

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'department_skills', 'department_id', 'skill_id')
    ->wherePivotNull('deleted_at');

    }

    /**
     * Get the reporting manager associated with the department.
     */
    public function get_reporting_manager(): HasOne
    {
        return $this->hasOne(ReportingManager::class, 'id', 'reporting_manager_id')->select('email');
    }

}