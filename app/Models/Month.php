<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    protected $fillable = ['month'];

    public function EmpLeave()
    {
        return $this->belongsTo(EmpLeave::class, 'id', 'month_id');
    }
}
