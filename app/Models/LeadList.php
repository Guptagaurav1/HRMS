<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadList extends Model
{
    use HasFactory;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Save record of login user on default events of model.
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

    public function leadAssignUser(){
        return $this->hasOne(LeadAssignUser::class, 'lead_id','id');
    }

    public function projectDetails(){
        return $this->belongsTo(CrmProjectList::class, 'project_id','id');
    }

    public function getCategory(){
        return $this->belongsTo(LeadCategoryList::class, 'category_id','id');
    }

    public function getSource(){
        return $this->belongsTo(LeadSourceList::class, 'source_id','id');
    }

    public function getAttachment(){
        return $this->belongsTo(LeadAttachment::class, 'lead_id','id');
    }



}
