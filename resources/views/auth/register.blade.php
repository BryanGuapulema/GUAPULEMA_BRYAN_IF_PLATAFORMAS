@extends('layouts.auth-master')

@section('content')
    <form method="post" action="/register">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1 class="h3 mb-3 fw-normal">Registrarse</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Bryan Guapulema" required="required" autofocus>
            <label for="floatingEmail">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>


        <div class="form-group form-floating mb-3">
            <label for="floatingName"></label>
            <div class="form-group form-floating mb-3">
                <select name="role" id="role" class="form-select" required>
                    <option value="">Seleccionar rol</option>  
                    @foreach ($activeRoles as $role)
                    <option value="{{ $role->id }}" <?php  echo $role->name ==='Administrador'  ? 'disabled' : ''; ?>>
                            {{ $role->name }}
                        </option>
                    @endforeach               
                </select>
            </div>   
            @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
            @endif   
        </div>


            
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <p>
            <h6 class="card-subtitle mb-2 text-body-secondary"><a href="/login">Ya tengo una cuenta</a></h6>
            <h6 class="card-subtitle mb-2 text-body-secondary"><a href="/">Inicio</a></h6>
        </p>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                
    </form>
@endsection