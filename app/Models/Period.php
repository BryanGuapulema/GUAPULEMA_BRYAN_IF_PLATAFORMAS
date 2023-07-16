<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employeeDegrees()
    {
        return $this->hasMany(EmployeeDegree::class, 'id_period');            
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($period) {            
            if ($period->state === 'Inactivo') {
                $listaIds = $period->employeeDegrees()->pluck('id');  
                $employeeDegrees = EmployeeDegree::whereIn('id', $listaIds)->get();
                
                foreach ($employeeDegrees as $employeeDegree) {
                    app('App\Http\Controllers\EmployeeDegreeController')->updateState($employeeDegree);
                }
            }else if ($period->state === 'Activo') 
            {
                $listaIds = $period->employeeDegrees()->pluck('id');
                $employeeDegrees = EmployeeDegree::whereIn('id', $listaIds)->get();
                
                foreach ($employeeDegrees as $employeeDegree) {
                    app('App\Http\Controllers\EmployeeDegreeController')->updateState($employeeDegree);
                }
            }
        });
    }
}
