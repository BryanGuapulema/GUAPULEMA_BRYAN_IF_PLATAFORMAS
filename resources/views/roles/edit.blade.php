@extends('layouts.template')

@section('title','EDITAR ROL')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Editar Rol</h2>

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

        <form action="{{url('roles/'.$role->id)}}" method="post">
            @method("PUT")
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="name" id="name" value="{{$role->name}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="institucion" class="col-sm-2 col-form-label">Institucion</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="institution" id="institution" value="{{$role->institution}}" required>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="state" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-5">
                    <select name="state" id="state" class="form-select" required>
                        <option value="">Seleccionar estado</option>
                        <option value="Activo" {{ $role->state == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ $role->state == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>   
                @if ($errors->has('state'))
                    <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                @endif   
            </div>

            <a href="{{url('roles')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>        
        
    </div>
</main>