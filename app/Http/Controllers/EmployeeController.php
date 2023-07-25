<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;



class EmployeeController extends Controller
{
    public function index()
    {
        //$employees = Employee::all();   
        $employees = Employee::with('user')->get();     
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

        // Obtener el id del usuario autenticado        
        $user_id = Auth::id();        

        // Asignar al campo 'usermodifica'    
        $employee->user_modifica = $user_id;                
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

         // Actualizar el campo "state" en la tabla de actividades de empleados ("EmployeeActivities") a través de la API
         $client = new Client([
            'verify' => false,
        ]);

        $id = $employee->id;        
        $url = 'https://localhost:44356/api/EmployeeActiviries?idEmployee=' . $id;
        $response = $client->get($url);
        $employeeActivities = json_decode($response->getBody(), true);
        //dd($employeeActivities);

        foreach ($employeeActivities as $activity) {
            if( $activity['idEmployee'] === $employee->id){
                $activityUrl = 'https://localhost:44356/api/EmployeeActiviries/' . $activity['idEmpAct'];
                $activityResponse = $client->put($activityUrl, [
                    'json' => [                    
                        'idEmpAct' => $activity['idEmpAct'],
                        'idEmployee' => $activity['idEmployee'],
                        'employeeName' => $activity['employeeName'],
                        'activity' => $activity['activity'],
                        'start_date' => $activity['start_date'],
                        'end_date' => $activity['end_date'],                            
                        'state' => $employee->state,
                    ],
                ]);
            }                    
        }
        

        return redirect()->route('employees.index');
    }
}

