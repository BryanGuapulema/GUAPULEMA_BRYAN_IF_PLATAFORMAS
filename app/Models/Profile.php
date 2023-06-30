<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //a profile can be owned by one or more users    
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
