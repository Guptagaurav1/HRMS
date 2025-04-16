<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecEducationalDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rec_id','10th_percentage','10th_year','10th_board','10th_doc','12th_percentage','12th_year','12th_board','12th_doc','grad_name','grad_percentage','grad_year','grad_mode','grad_doc','post_grad_name','post_grad_percentage','post_grad_year','post_grad_mode','post_grad_doc'];
        
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
