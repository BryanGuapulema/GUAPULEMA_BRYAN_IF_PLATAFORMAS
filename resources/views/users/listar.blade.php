@extends('layouts.template')

@section('title','LISTA DE USUARIOS')

@section('contenido')

<main>
    <div class="container py-4 ">
        <h2>Listado usuarios</h2>
        <a href="/register" class="btn btn-primary btn-sm">
            Nuevo usuario
        </a>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nombre de Usuario</th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>                    
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    @foreach ($user->role as $role)
                        <td>{{ $role->name }}</td>
                    @endforeach                    
                    <td>{{$user->email}}</td> 
                    <td>ACTIVO</td>               
                    <td>
                        <a href="{{url('users/' .$user->id .'/edit')}}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{url('users/'. $user->id)}}" method="post">
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