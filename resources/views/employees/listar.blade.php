@extends('layouts.template')

@section('title','LISTA DE EMPLEADOS')

@section('contenido')
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
        <h2>Listado Empleados</h2>
        <a href="{{url('employees/create')}}" class="btn btn-primary btn-sm">
            Nuevo Empleado
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codigo Empleado</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>ID Usuario</th>
                    <th>Estado</th>
                    <th>Fecha ingreso</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificacion</th>
                    <th>Usario Modifica</th>                    
                    <th></th>  
                    <th></th>              
                </tr>
            </thead>

            <tbody>
                @foreach($employees as $employee)
                <tr @if ($employee->state === 'Inactivo') class="table-danger" @endif>                    
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->employee_code}}</td>
                    <td>{{$employee->lastname}}</td>
                    <td>{{$employee->firstname}}</td>
                    <td>{{$employee->user_id}}</td>
                    <td>{{$employee->state}}</td>
                    <td>{{$employee->last_logging_at}}</td>   
                    <td>{{$employee->created_at}}</td>
                    <td>{{$employee->updated_at}}</td>
                    <td>NULL</td>    
                    <td></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form>
                                <a href="{{url('employees/' .$employee->id.'/edit')}}" class="btn btn-success btn-sm">
                                    Editar
                                </a>
                            </form>                                                                           

                            <form method="POST" action="{{url('employees/'. $employee->id.'/update-state')}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Estado
                                </button>
                            </form>

                            <form action="{{url('employees/'. $employee->id)}}" method="post">
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