@extends('layouts.template')

@section('title','EDITAR EMPLEADO')

@section('contenido')
@include('layouts.partials.navbar')  

<main>
    <div class="container py-4">
        <h2>Editar empleado</h2>

        @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{url('employees/'.$employee->id)}}" method="post">
            @method("PUT")
            @csrf

            <div class="mb-3 row">
                <label for="employee_code" class="col-sm-2 col-form-label">Código de Empleado</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="employee_code" id="employee_code" value="{{$employee->employee_code}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="lastname" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="lastname" id="lastname" value="{{$employee->lastname}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="firstname" class="col-sm-2 col-form-label">Nombres</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="firstname" id="firstname" value="{{$employee->firstname}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="user_id" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-5">
                    <select name="user_id" id="user_id" class="form-select">
                        <option disabled>Seleccione su nombre de usuario</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if (in_array($user->id, $registeredUserIds)) disabled @endif
                        @if ($user->id === $employee->user_id) selected @endif    
                        >
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </div>
        </div>
            
            <a href="{{url('employees')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>