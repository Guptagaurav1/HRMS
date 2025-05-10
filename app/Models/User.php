<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name', 'last_name', 'email', 'phone', 'department_id',
        'company_id', 'role_id', 'gender', 'dob', 'password','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

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

    public function department()
        {
            return $this->belongsTo(Department::class, 'department_id');
        }



    /**
     * Get role name.
    */
   
    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id')->select('role_name', 'fullname','id');
    }

    public function hasPermission($routeName)
    {
        $user = auth()->user();
        if (!$user) {
            return false; 
        }
        $menu = Menu::where('page', $routeName)->first();
       
        if (!$menu) {
            return false; 
        }
        $role = Role::select('menu_id')->where('id', $user->role_id)->first();
        if (!$role || !$role->menu_id) {
            return false; // Role not found or no menu assigned
        }
        // Ensure we compare against menu IDs, not route names
        $menuIdExplode = explode(',', $role->menu_id);
        return in_array($menu->id, $menuIdExplode);
    
    }

}
