@extends('layouts.template')

@section('title','LISTA DE USUARIOS')

@section('contenido')
@include('layouts.partials.navbar')  


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
                <tr @if ($user->state === 'Inactivo') class="table-danger" @endif>                    
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    @foreach ($user->role as $role)
                        <td>{{ $role->name }}</td>
                    @endforeach                    
                    <td>{{$user->email}}</td> 
                    <td>{{$user->state}}</td>               
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form>
                                <a href="{{url('users/' .$user->id .'/edit')}}" class="btn btn-success btn-sm">
                                    Editar
                                </a>
                            </form>
                            

                            <form method="POST" action="{{url('users/'. $user->id.'/update-state')}}   ">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        Cambiar Estado
                                    </button>
                            </form> 

                            <form action="{{url('users/'. $user->id)}}" method="post">
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