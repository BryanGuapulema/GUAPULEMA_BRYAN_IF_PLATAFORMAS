@extends('layouts.template')

@section('title','EDITAR RELACIONES')

@section('contenido')
@include('layouts.partials.navbar')  

<main>
    <div class="container py-4">
        <h2>Editar Relacion</h2>

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
        
        <form action="{{url('employee_degrees/'.$employeeDegree->id)}}" method="post">
            @method("PUT")
            @csrf
            
            <div class="mb-3 row">
                <label for="id_employee" class="col-sm-2 col-form-label">Codigo Empleado</label>
                <div class="col-sm-5">
                    <select name="id_employee" id="id_employee" class="form-select">
                        @foreach ($employees as $id => $employeeCode)
                            <option value="{{ $id }}"  {{ $id == $employeeDegree->id_employee ? 'selected' : '' }}>
                                {{ $employeeCode }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="id_degree" class="col-sm-2 col-form-label">Carrera</label>
                <div class="col-sm-5">
                <select name="id_degree" id="id_degree" class="form-select">
                    @foreach ($degrees as $id => $degreeName)
                    <option value="{{ $id }}" {{ $id == $employeeDegree->id_degree ? 'selected' : '' }}>
                            {{ $degreeName }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_period" class="col-sm-2 col-form-label">Periodo</label>
                <div class="col-sm-5">
                     <select name="id_period" id="id_period" class="form-select">
                        @foreach ($periods as $id => $periodName)
                        <option value="{{ $id }}" {{ $id == $employeeDegree->id_period ? 'selected' : '' }}>
                                {{ $periodName }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-5">
                    <input class="form-control" type="date" name="date" id="date" value="{{$employeeDegree->date}}" required>
                </div>
            </div>

            <a href="{{url('employee_degrees')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>