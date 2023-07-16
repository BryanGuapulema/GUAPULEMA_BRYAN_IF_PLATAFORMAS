@extends('layouts.template')

@section('title','REGISTAR RELACIONES')

@section('contenido')
@include('layouts.partials.navbar')  

<main>
    <div class="container py-4">
        <h2>Registrar Relacion</h2>

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

        <form action="{{url('employee_degrees')}}" method="post">
            @csrf
            
            <div class="mb-3 row">
                <label for="id_employee" class="col-sm-2 col-form-label">Codigo Empleado</label>
                <div class="col-sm-5">
                    <select name="id_employee" id="id_employee" class="form-select">
                        @foreach ($employees as $id => $employeeCode)
                            <option value="{{ $id }}">{{ $employeeCode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="id_degree" class="col-sm-2 col-form-label">Carrera</label>
                <div class="col-sm-5">
                <select name="id_degree" id="id_degree" class="form-select">
                    @foreach ($degrees as $id => $degreeName)
                        <option value="{{ $id }}">{{ $degreeName }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_period" class="col-sm-2 col-form-label">Periodo</label>
                <div class="col-sm-5">
                     <select name="id_period" id="id_period" class="form-select">
                        @foreach ($periods as $id => $periodName)
                            <option value="{{ $id }}">{{ $periodName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <a href="{{url('degrees')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>