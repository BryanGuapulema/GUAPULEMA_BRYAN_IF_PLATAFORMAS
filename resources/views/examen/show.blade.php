@extends('layouts.template')

@section('title','ACTUALIZACIÓN')

@section('contenido')
@include('layouts.partials.navbar')  


<main>
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="card justify-content-center align-items-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">EMPLEADO ACTIVIDAD</h5>
                <img src="data:image/png;base64,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" class="img-fluid img-fluid" alt="Photo">
            </div>
            <ul class="list-group list-group-flush">                          
                <li class="list-group-item"><b>ID: </b> {{$data['idEmpAct']}}</li>
                <li class="list-group-item"><b>ID Empleado: </b> {{$data['idEmployee']}}</li>
                <li class="list-group-item"><b>Nombre Empleado: </b> {{$data['employeeName']}}</li>            
                <li class="list-group-item"><b>Actividad: </b> {{$data['activity']}}</li>  
                <li class="list-group-item"><b>Fecha Inicio: </b> {{$data['start_date']}}</li> 
                <li class="list-group-item"><b>Fecha Fin: </b> {{$data['end_date']}}</li>
                <li class="list-group-item"><b>State: </b> {{$data['state']}}</li>
            </ul>
        </div>
    </div>

    <div class="container mt-5  d-flex justify-content-center align-items-center">
        
            <a href="{{url('employee_activity')}}" class="btn btn-secondary">Regresar</a>
                      
    <div>
</main>