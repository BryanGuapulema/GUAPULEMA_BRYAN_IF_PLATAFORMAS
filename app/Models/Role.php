<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    //a role can be owned by one or more users    
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
