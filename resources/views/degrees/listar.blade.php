@extends('layouts.template')

@section('title','LISTA DE CARRERAS')

@section('contenido')
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
        <h2>Listado Carreras</h2>
        <a href="{{url('degrees/create')}}" class="btn btn-primary btn-sm">
            Nueva Carrera
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Carrera</th>
                    <th>Facultad</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificacion</th>
                    <th>Usario Modifica</th>                    
                    <th></th>  
                    <th></th>              
                </tr>
            </thead>

            <tbody>
                @foreach($degrees as $degree)
                <tr @if ($degree->state === 'Inactivo') class="table-danger" @endif>                    
                    <td>{{$degree->id}}</td>
                    <td>{{$degree->degree_name}}</td>
                    <td>{{$degree->faculty}}</td>
                    <td>{{$degree->state}}</td>
                    <td>{{$degree->created_at}}</td>
                    <td>{{$degree->updated_at}}</td>
                    <td>NULL</td>    
                    <td></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form>
                                <a href="{{url('degrees/' .$degree->id.'/edit')}}" class="btn btn-success btn-sm">
                                    Editar
                                </a>
                            </form>                                                                           

                            <form method="POST" action="{{url('degrees/'. $degree->id.'/update-state')}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Estado
                                </button>
                            </form>

                            <form action="{{url('degrees/'. $degree->id)}}" method="post">
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