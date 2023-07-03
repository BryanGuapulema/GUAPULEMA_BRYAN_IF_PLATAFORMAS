@extends('layouts.template')

@section('title','EDITAR ROL')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Editar Rol</h2>

        @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach(errors->all() as $error)
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
                    <input class="form-control" type="text" name="name" id="name" value="{{role->name}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="institucion" class="col-sm-2 col-form-label">Institucion</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="institution" id="institution" value="{{role->institution}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-5">
                    <select class="form-select" name="estado" id="estado" value="{{role->estado}}" required>
                        <option value="" >Seleccione el estado</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
            </div>
        </form>

        <a href="{{url('roles')}}" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</main>