<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //a role can be owned by one or more users    
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
