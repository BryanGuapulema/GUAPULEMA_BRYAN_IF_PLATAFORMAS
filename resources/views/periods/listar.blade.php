@extends('layouts.template')

@section('title','LISTA DE PERIODOS')

@section('contenido')
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
        <h2>Listado Periodo</h2>
        <a href="{{url('periods/create')}}" class="btn btn-primary btn-sm">
            Nuevo Periodo
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Periodo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificacion</th>
                    <th>Usario Modifica</th>                    
                    <th></th>  
                    <th></th>              
                </tr>
            </thead>

            <tbody>
                @foreach($periods as $period)
                <tr @if ($period->state === 'Inactivo') class="table-danger" @endif>                    
                    <td>{{$period->id}}</td>
                    <td>{{$period->period_name}}</td>
                    <td>{{$period->start_date}}</td>
                    <td>{{$period->end_date}}</td>
                    <td>{{$period->state}}</td>
                    <td>{{$period->created_at}}</td>
                    <td>{{$period->updated_at}}</td>
                    <td>NULL</td>    
                    <td></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form>
                                <a href="{{url('periods/' .$period->id.'/edit')}}" class="btn btn-success btn-sm">
                                    Editar
                                </a>
                            </form>                                                                           

                            <form method="POST" action="{{url('periods/'. $period->id.'/update-state')}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Estado
                                </button>
                            </form>

                            <form action="{{url('periods/'. $period->id)}}" method="post">
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