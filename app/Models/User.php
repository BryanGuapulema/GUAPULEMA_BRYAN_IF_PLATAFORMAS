<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'state',
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
    ];

    //Use fo mutators for password encryption
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    //an user can have one or more roles    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    //an user can have one or more profiles  
    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'users_profiles');
    }


}
