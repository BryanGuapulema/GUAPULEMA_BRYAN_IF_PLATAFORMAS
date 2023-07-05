@extends('layouts.template')

@section('title','LISTA DE USUARIOS|ROLES')

@section('contenido') 
@include('layouts.partials.navbar')  


<main>
    <div class="container py-4 ">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Role Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach ($user->role as $role)
                                {{ $role->name }}
                            @endforeach
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
