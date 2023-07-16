<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employeeDegrees()
    {
        return $this->hasMany(EmployeeDegree::class, 'id_degree');
    }


    protected static function boot()
    {
        parent::boot();

        static::updating(function ($degree) {            
            if ($degree->state === 'Inactivo') {
                $listaIds = $degree->employeeDegrees()->pluck('id');  
                $employeeDegrees = EmployeeDegree::whereIn('id', $listaIds)->get();
                
                foreach ($employeeDegrees as $employeeDegree) {
                    app('App\Http\Controllers\EmployeeDegreeController')->updateState($employeeDegree);
                }
            }else if ($degree->state === 'Activo') 
            {
                $listaIds = $degree->employeeDegrees()->pluck('id');
                $employeeDegrees = EmployeeDegree::whereIn('id', $listaIds)->get();
                
                foreach ($employeeDegrees as $employeeDegree) {
                    app('App\Http\Controllers\EmployeeDegreeController')->updateState($employeeDegree);
                }
            }
        });
    }
}
