<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use App\Recepie;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission)
    {
        $hasPermission = false;
        $this->roles->each(function ($role) use (&$hasPermission, $permission){
            $hasPermission = $role->hasPermission($permission);
        });
        return $hasPermission;
    }

    public function recepies() {
        return $this->hasMany(Recepie::class);
    }
}
