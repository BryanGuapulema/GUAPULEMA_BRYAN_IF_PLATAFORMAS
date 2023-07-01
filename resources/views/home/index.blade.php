@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth

        @if(!(auth()->user()->email_verified_at))
        <p><a href="/email/verify">fsdfs</a> </p>
        @endif 
        

        <h1>Dashboard</h1>
        <p class="lead">Solo usuarios autenticados pueden ver este contenido.</p>     
        <p>BIENVENIDO {{auth()->user()->name ?? auth()->user()->username}} , estás autenticado</p>                       

        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">HOME PAGE. Porfavor <a href="/login">inicia sesion</a> para tener acceso al contenido.</p>
        @endguest
    </div>
@endsection