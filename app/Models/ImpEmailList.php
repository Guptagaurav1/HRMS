<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpEmailList extends Model
{
    use HasFactory;

    protected $fillable = ['id','email','department','role_id','status'];
}
