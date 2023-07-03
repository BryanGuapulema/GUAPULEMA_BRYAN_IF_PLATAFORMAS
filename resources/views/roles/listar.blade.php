@extends('layouts.template')

@section('title','LISTA DE ROLES')

@section('contenido')

<main>
    <div class="container py-4 ">
        <h2>Listado roles</h2>
        <a href="{{url('roles/create')}}" class="btn btn-primary btn-sm">
            Nuevo rol
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Institucion</th>                               
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($roles as $role)
                <tr>                    
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->institution}}</td>
                    <td>{{$role->state}}</td>                               
                    <td>
                        <a href="{{url('roles/' .$role->id .'/edit')}}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{url('roles/'. $role->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
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