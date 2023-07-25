@extends('layouts.template')

@section('title','LISTA DE EMPLEADOS')

@section('contenido')
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
        <h2>Listado Actividades por Empleado</h2>
        <a href="{{url('employee_activity/create')}}" class="btn btn-primary btn-sm">
            Nueva Actividad
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Empleado</th>                    
                    <th>Nombre Empleado</th>
                    <th>Actividad</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>                   
                    <th></th>  
                    <th></th>              
                </tr>
            </thead>

            <tbody>
            @foreach($data as $employeeActivity)            
            <tr @if ($employeeActivity['state'] === "Inactivo            ") class="table-danger" @endif>                                    
                    <td>{{$employeeActivity["idEmpAct"]}}</td>
                    <td>{{$employeeActivity["idEmployee"]}}</td>
                    <td>{{$employeeActivity["employeeName"]}}</td>
                    <td>{{$employeeActivity["activity"]}}</td>
                    <td>{{$employeeActivity["start_date"]}}</td>
                    <td>{{$employeeActivity["end_date"]}}</td>
                    <td>{{$employeeActivity["state"]}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form>
                                <a href="{{url('employee_activity/' .$employeeActivity["idEmpAct"])}}" class="btn btn-info btn-sm">
                                    Ver
                                </a>
                            </form>                                                                           
                                                    
                            <form>
                                <a href="{{url('employee_activity/' .$employeeActivity["idEmpAct"].'/edit')}}" class="btn btn-success btn-sm">
                                    Editar
                                </a>
                            </form>                                                                           
                            
                        
                            <form action="{{url('employee_activity/'. $employeeActivity['idEmpAct'])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </td>
            </tr>                        
            @endforeach
            </tbody>
        </table>
        <a href="/home" class="btn btn-primary btn-sm">
            Volver al Home
        </a>
    </div>
</main>
