@extends('layouts.template')

@section('title','ACTUALIZACIÓN')

@section('contenido')

<main>
    <div class="container mt-5">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h4 class="card-title ">Actualización de usuario exitosa</h4>
                <p class="card-text">El usuario ha sido actualizado correctamente.</p>
            </div>
        </div>
    </div>
     
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="card justify-content-center align-items-center" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2012/04/18/00/07/silhouette-of-a-man-36181_1280.png" class="img-fluid img-fluid" alt="Photo">
            <div class="card-body">
                <h5 class="card-title">{{auth()->user()->username}}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nombre: </b> {{auth()->user()->name}}</li>
                <li class="list-group-item"><b>Username: </b> {{auth()->user()->username}}</li>
                <li class="list-group-item"><b>Email: </b> {{auth()->user()->email}}</li>            
                <li class="list-group-item"><b>Rol: </b> {{auth()->user()->role()->first()->name}}</li>  
            </ul>
        </div>
    </div>

    <div class="container mt-5  d-flex justify-content-center align-items-center">
        @if(auth()->user()->role()->first()->name ==='Administrador')
            <a href="{{url('users')}}" class="btn btn-secondary" >Regresar</a>
        @else
            <a href="{{url('home')}}" class="btn btn-secondary">Regresar</a>
        @endif                
    <div>
</main>