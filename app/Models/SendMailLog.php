<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMailLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'send_mail_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uni_id', 'receiver_name', 'receiver_email', 'job_position', 'department', 'sender_email', 'message'];

    /**
     * Save User id on CRUD operation.
     *
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
}
