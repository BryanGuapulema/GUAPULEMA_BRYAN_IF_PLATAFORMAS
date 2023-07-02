@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth

        @if(!(auth()->user()->email_verified_at))
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Verificación de correo electrónico</h4>
                    <p class="card-text">Gracias por registrarte. Antes de comenzar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que te hemos enviado.</p>
                    <p class="card-text">Si no has recibido el correo electrónico de verificación, puedes solicitar otro haciendo clic en el botón a continuación:</p>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Enviar correo de verificación</button>
                    </form>
                </div>
            </div>
        </div>

        @endif 
        
        <div class="container mt-5">
            <h1>Dashboard</h1>
            <p class="lead">Solo usuarios autenticados pueden ver este contenido.</p>     
            <p>BIENVENIDO {{auth()->user()->name ?? auth()->user()->username}} , estás autenticado</p>                       
        </div >
        
        @endauth

        @guest
        <div class="container mt-5">
            <h1>Homepage</h1>
            <p class="lead">HOME PAGE. Porfavor <a href="/login">inicia sesion</a> para tener acceso al contenido.</p>
        </div>
        @endguest
    </div>
@endsection