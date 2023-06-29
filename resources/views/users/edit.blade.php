@extends('layouts.template')

@section('title','EDITAR USUARIO')

@section('contenido')

<main>
    <div class="container py-4 ">
        <h2>Editar usuario</h2>
        
        <form action="{{url('users/' .$user->id)}}" method="post">
            @method("PUT")
            @csrf            

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Bryan Guapulema" required="required" autofocus>
                <label for="floatingEmail">Name</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" required="required" autofocus>
                <label for="floatingName">Username</label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="name@example.com" required="required" autofocus>
                <label for="floatingEmail">Email address</label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <a href="{{url('users')}}" class="btn btn-secondary" >Regresar</a>
            <button class="btn btn-success" type="submit">Guardar</button>

        </form>        
    </div>
</main>





        
        