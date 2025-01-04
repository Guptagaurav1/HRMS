<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentSkill extends Model
{
    use HasFactory,SoftDeletes;
    
    public $timestamps = false;

    public function getDepartment(){
        return $this->hasMany(Department::class, 'id','department_id')->select('department_id')->groupBy('department_id');
    }

    public function getSkill(){
        return $this->hasMany(Skill::class, 'id','skill_id');
    }
}
