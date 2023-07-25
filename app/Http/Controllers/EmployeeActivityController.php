<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EmployeeActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client([
            'verify' => false,
        ]);
                
        $url = 'https://localhost:44356/api/EmployeeActiviries';
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true); 
        //dd($data);

        return view('examen.listar',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();        
        return view('examen.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date', 
            'idEmployee' => 'required'
        ]);

        $empleadoId = $request->input('idEmployee');
        $empleado = Employee::find($empleadoId);
        $nombreEmpleado = $empleado->firstname;
        $estadoEmpleado = $empleado->state;

        $client = new Client([
            'verify' => false,
        ]);
                    
        $url = 'https://localhost:44356/api/EmployeeActiviries';

        $response = $client->post($url, [
            'json' => [
                'idEmployee' => $request->input('idEmployee'),
                'employeeName' => $nombreEmpleado,
                'activity' => $request->input('activity'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),                            
                'state' => $estadoEmpleado,
            ],
        ]);
                        
        return redirect()->route('employee_activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = new Client([
            'verify' => false,
        ]);

        $url = 'https://localhost:44356/api/EmployeeActiviries/' . $id;
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        //dd($data);
        return view('examen.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
                      

        $client = new Client([
            'verify' => false,
        ]);
    
        $url = 'https://localhost:44356/api/EmployeeActiviries/' . $id;
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        $employees = Employee::all();  
        //dd($data);

        return view('examen.edit', compact('data', 'employees'));

    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'activity' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date', 
            'idEmployee' => 'required'
        ]);

        $empleadoId = $request->input('idEmployee');
        $empleado = Employee::find($empleadoId);
        $nombreEmpleado = $empleado->firstname;
        $estadoEmpleado = $empleado->state;

        $client = new Client([
            'verify' => false,
        ]);
    
        // Actualizar los datos del empleado en la API
        $url = 'https://localhost:44356/api/EmployeeActiviries/' . $id;
        $response = $client->put($url, [
            'json' => [
                'idEmpAct' => $request->input('idEmpAct'),
                'idEmployee' => $request->input('idEmployee'),
                'employeeName' => $nombreEmpleado,
                'activity' => $request->input('activity'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),                            
                'state' => $estadoEmpleado,
            ],
        ]);
    
        return redirect()->route('employee_activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = new Client([
            'verify' => false,
        ]);
    
        $url = 'https://localhost:44356/api/EmployeeActiviries/' . $id;
        $response = $client->delete($url);

        return redirect()->route('employee_activity.index');
    }
}
