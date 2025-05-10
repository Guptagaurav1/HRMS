<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CrmProjectList extends Model
{
    use HasFactory;

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

     public function client()
     {
         return $this->belongsTo(ClientList::class, 'client_id', 'id');
     }

      /**
     *  Get the client name.
     */
}
