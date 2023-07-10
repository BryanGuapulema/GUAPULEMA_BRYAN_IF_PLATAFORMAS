<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    //when an update in roles is done, it'll check the state and will disable users
    //if are inactive
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($role) {
            if ($role->state === 'Inactivo') {
                $userIds = $role->user()->pluck('id');
                $users = User::whereIn('id', $userIds)->get();
                
                foreach ($users as $user) {
                    app('App\Http\Controllers\UserController')->updateState($user);
                }
            }
        });
    }

    //a role can be owned by one or more users    
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
