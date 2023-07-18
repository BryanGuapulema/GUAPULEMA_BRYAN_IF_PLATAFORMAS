<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDegree extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'id_degree');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'id_period');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_modifica');
    }
}

