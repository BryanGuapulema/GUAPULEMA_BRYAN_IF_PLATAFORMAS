<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();        
        return view('employees.listar', compact('employees'));
    }

    public function create()
    {
        $users = User::all();
        $registeredUserIds = Employee::pluck('user_id')->toArray();
        return view('employees.create', compact('users', 'registeredUserIds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|string|max:10|unique:employees',
            'lastname' => 'required|string|max:50',
            'firstname' => 'required|string|max:50',
            'user_id' => 'required|integer|unique:employees',
        ]);

        $employee = new Employee;
        $employee->employee_code = $request->input('employee_code');
        $employee->lastname = $request->input('lastname');
        $employee->firstname = $request->input('firstname');
        $employee->user_id = $request->input('user_id');
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $users = User::all();
        $registeredUserIds = Employee::pluck('user_id')->toArray();
        return view('employees.edit', compact('employee','users', 'registeredUserIds'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_code' => 'required|string|max:10|unique:employees,employee_code,'.$id,
            'lastname' => 'required|string|max:50',
            'firstname' => 'required|string|max:50',
            'user_id' => 'required|integer|unique:employees,user_id,'.$id
        ]);

        $employee = Employee::findOrFail($id);
        $employee->employee_code = $request->input('employee_code');
        $employee->lastname = $request->input('lastname');
        $employee->firstname = $request->input('firstname');
        $employee->user_id = $request->input('user_id');
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect("employees");
    }

    public function updateState(Employee $employee)
    {
        $employee->state = $employee->state === 'Activo' ? 'Inactivo' : 'Activo';
        $employee->save();

        return redirect()->route('employees.index');
    }
}

