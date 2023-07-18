<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_modifica');
    }

    public function employeeDegrees()
    {
        return $this->hasMany(EmployeeDegree::class, 'id_employee');
    }


    protected static function boot()
    {
        parent::boot();

        static::updating(function ($employee) {            
            if ($employee->state === 'Inactivo') {
                $listaIds = $employee->employeeDegrees()->pluck('id');  
                $employeeDegrees = EmployeeDegree::whereIn('id', $listaIds)->get();
                
                foreach ($employeeDegrees as $employeeDegree) {
                    app('App\Http\Controllers\EmployeeDegreeController')->updateState($employeeDegree);
                }
            }else if ($employee->state === 'Activo') 
            {
                $listaIds = $employee->employeeDegrees()->pluck('id');
                $employeeDegrees = EmployeeDegree::whereIn('id', $listaIds)->get();
                
                foreach ($employeeDegrees as $employeeDegree) {
                    app('App\Http\Controllers\EmployeeDegreeController')->updateState($employeeDegree);
                }
            }
        });
    }
}
