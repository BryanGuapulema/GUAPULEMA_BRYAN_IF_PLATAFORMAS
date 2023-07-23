<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Employee;
use App\Models\EmployeeDegree;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeDegreeController extends Controller
{
    public function index()
    {        
        $employeedegrees = EmployeeDegree::with(['employee:id,employee_code', 'degree:id,degree_name', 'period:id,period_name','user'])->get();
        
        return view('employee_degrees.listar', compact('employeedegrees'));
    }


    public function create()
    {
        $employees = Employee::where('state', 'Activo')->pluck('employee_code', 'id');
        $degrees = Degree::where('state', 'Activo')->pluck('degree_name', 'id');
        $periods = Period::where('state', 'Activo')->pluck('period_name', 'id');

        return view('employee_degrees.create', compact('employees', 'degrees', 'periods'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_employee' => 'required|integer',
            'id_degree' => 'required|integer',
            'id_period' => 'required|integer',    
        ]);
    
        $employeeDegree = new EmployeeDegree();
        $employeeDegree->id_employee = $request->input('id_employee');
        $employeeDegree->id_degree = $request->input('id_degree');
        $employeeDegree->id_period = $request->input('id_period');        
        $employeeDegree->save();
    
        return redirect()->route('employee_degrees.index');
    }
    

public function edit($id)
{
    $employeeDegree = EmployeeDegree::findOrFail($id);
    $employees = Employee::where('state', 'Activo')->pluck('employee_code', 'id');
    $degrees = Degree::where('state', 'Activo')->pluck('degree_name', 'id');
    $periods = Period::where('state', 'Activo')->pluck('period_name', 'id');

    return view('employee_degrees.edit', compact('employeeDegree', 'employees', 'degrees', 'periods'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_employee' => 'required|integer',
            'id_degree' => 'required|integer',
            'id_period' => 'required|integer',    
        ]);
    
        $employeeDegree = EmployeeDegree::findOrFail($id);
        $employeeDegree->id_employee = $request->input('id_employee');
        $employeeDegree->id_degree = $request->input('id_degree');
        $employeeDegree->id_period = $request->input('id_period');
        $employeeDegree->date = $request->input('date');

        // Obtener el id del usuario autenticado        
        $user_id = Auth::id();        

        // Asignar al campo 'usermodifica'    
        $employeeDegree->user_modifica = $user_id;

        $employeeDegree->save();
    
        return redirect()->route('employee_degrees.index');
    }

    public function destroy($id)
    {
        $employeeDegree = EmployeeDegree::findOrFail($id);
        $employeeDegree->delete();

        return redirect()->route('employee_degrees.index');    
    }

    public function updateState(EmployeeDegree $employeeDegree)
    {
        $employeeDegree->state = $employeeDegree->state === 'Activo' ? 'Inactivo' : 'Activo';
        $employeeDegree->save();

        return redirect()->route('employees.index');
    }
}
