@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">        
        @if (Auth::check() && Auth::user()->state == 'Inactivo')
            <div class="card" style="width: 60rem;">
            <div class="card-body">
                <h5 class="card-title">Cuenta inactiva</h5>
                <p class="card-text">Esta cuenta se encuentra inactiva.Por favor contactse con el administrador para activarla</p>
                <a href="/logout" class="btn btn-primary">Regresar</a>
            </div>
            </div>
        @else
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
        @endif
        
    </div>
@endsection