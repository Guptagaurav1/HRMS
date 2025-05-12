<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CrmProjectList extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     * 
     * 
     */
    protected $table = 'crm_project_lists';
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

      /**
     *  Get the client name.
     */
    /**
     * Get the client associated with the project.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(ClientList::class, 'client_id', 'id')->select('id','client_name');
    }

    /**
     * Get the user associated with the project.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->select('first_name', 'last_name');
    }

    /**
     * Get the user associated with the project.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(LeadCategoryList::class, 'category_id', 'id')->select('category_name');
    }


    /**
     * Get the attachments for the project.
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(CrmProjectAttachment::class, 'project_id', 'id')->select('id', 'file_name', 'file_type', 'created_at');
    }

}
