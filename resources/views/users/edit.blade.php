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

            <div class="form-group form-floating mb-3">
                <label for="floatingName"></label>
                <div class="form-group form-floating mb-3" >
                    <select name="role" id="role" class="form-select" required>
                        <option value="">Seleccionar rol</option>                
                        @foreach (\App\Models\Role::all() as $role)                        
                        <option value="{{ $role->id }}" 
                            {{ $user->role->first() && $user->role->first()->id == $role->id ? 'selected' : '' }}
                            <?php  echo  $role->name ==='Administrador'  ? 'disabled' : ''; ?>
                            >
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
                <label for="state"></label>
                <div class="form-group form-floating mb-3">
                    <select name="state" id="state" class="form-select" required>
                        <option value="">Seleccionar estado</option>
                        <option value="Activo" {{ $user->state == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ $user->state == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>   
                @if ($errors->has('state'))
                    <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                @endif   
            </div>

            

            <a href="{{url('users')}}" class="btn btn-secondary" >Regresar</a>
            <button class="btn btn-success" type="submit">Guardar</button>

        </form>        
    </div>
</main>





        
        