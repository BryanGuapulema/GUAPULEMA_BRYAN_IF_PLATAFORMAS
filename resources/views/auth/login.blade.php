@extends('layouts.auth-master')

@section('content')
    <form method="POST" action="/login">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <p>
            <h6 class="card-subtitle mb-2 text-body-secondary"><a href="/register">¿No tienes una cuenta?</a></h6>
            <h6 class="card-subtitle mb-2 text-body-secondary"><a href="/">Inicio</a></h6>
        </p>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>

    </form>
@endsection