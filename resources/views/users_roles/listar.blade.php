@extends('layouts.template')

@section('title','LISTA DE USUARIOS|ROLES')

@section('contenido') 
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
         <h4>ADMINISTRADOR</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Rolename</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @foreach ($user->role as $role)
                    @if($role->name==='Administrador')
                    <tr>                    
                        <td>{{ $user->username }}</td>
                        <td>                                                           
                            {{ $role->name }}                                                                                           
                        </td>
                    </tr>
                    @endif() 
                    @endforeach
                @endforeach
            </tbody>
        </table>
            


        <h4>USUARIOS</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Rolename</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @foreach ($user->role as $role)
                    @if($role->name==='Usuario')
                    <tr>                    
                        <td>{{ $user->username }}</td>
                        <td>                                                           
                            {{ $role->name }}                                                                                           
                        </td>
                    </tr>
                    @endif() 
                    @endforeach
                @endforeach
            </tbody>
        </table>
        
        <a href="/home" class="btn btn-primary btn-sm">
            Volver al Home
        </a>
    </div>
</main>
