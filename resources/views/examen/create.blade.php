@extends('layouts.template')

@section('title','REGISTAR EMPLEADO')

@section('contenido')
@include('layouts.partials.navbar')  

<main>
    <div class="container py-4">
        <h2>Registrar Actividad</h2>

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

        <form action="{{url('employee_activity')}}" method="post">
            @csrf            

            <div class="mb-3 row">
                <label for="activity" class="col-sm-2 col-form-label">Actividad</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="activity" id="activity" value="{{old ('activity')}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="start_date" class="col-sm-2 col-form-label">Fecha Inicio</label>
                <div class="col-sm-5">
                    <input class="form-control" type="date" name="start_date" id="start_date" value="{{old ('start_date')}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="end_date" class="col-sm-2 col-form-label">Fecha Fin</label>
                <div class="col-sm-5">
                    <input class="form-control" type="date" name="end_date" id="end_date" value="{{old ('end_date')}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="idEmployee" class="col-sm-2 col-form-label">Empleado</label>
                <div class="col-sm-5">
                    <select name="idEmployee" id="idEmployee" class="form-select">
                        <option>Seleccione su nombre de empleado</option>
                        @foreach ($employees as $employees)
                        <option value="{{ $employees->id }}">
                                {{ $employees->firstname }}
                            </option>
                        @endforeach
                    </select>
                </div>
        </div>
            
            <a href="{{url('employee_activity')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>