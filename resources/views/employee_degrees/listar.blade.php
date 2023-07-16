@extends('layouts.template')

@section('title','LISTA DE RELACIONES')

@section('contenido')
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
        <h2>Listado Relaciones</h2>
        <a href="{{url('employee_degrees/create')}}" class="btn btn-primary btn-sm">
            Nueva Relacion
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codigo Empleado</th>
                    <th>Carrera</th>
                    <th>Periodo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificacion</th>
                    <th>Usario Modifica</th>                    
                    <th></th>  
                    <th></th>              
                </tr>
            </thead>

            <tbody>                                                                                             
                @foreach ($employeedegrees as $employeedegree)  
                <tr @if ($employeedegree->state === 'Inactivo') class="table-danger" @endif>                    
                    <td>{{$employeedegree->id}}</td>
                    <td>{{$employeedegree->employee->employee_code }}</td>
                    <td>{{$employeedegree->degree->degree_name }}</td>
                    <td>{{$employeedegree->period->period_name }}</td>                     
                    <td>{{$employeedegree->date}}</td>
                    <td>{{$employeedegree->state}}</td>
                    <td>{{$employeedegree->created_at}}</td>
                    <td>{{$employeedegree->updated_at}}</td>
                    <td>NULL</td>    
                    <td></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form>
                                <a href="{{url('employee_degrees/' .$employeedegree->id.'/edit')}}" class="btn btn-success btn-sm">
                                    Editar
                                </a>
                            </form>                                                                           

                            <form action="{{url('employee_degrees/'. $employeedegree->id)}}" method="post">
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