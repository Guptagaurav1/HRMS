<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientList extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */

     protected $table = 'client_lists';

    protected $guarded = [];


     /**
     * Store user id details on crud.
     *
     * @var array
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
     *  Get the user who create the client.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->select('first_name', 'last_name');
    }

    /**
     *  Get the client attachments.
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(ClientAttachment::class, 'client_id', 'id')->select('id', 'file_name', 'file_type', 'created_at');
    }


}
