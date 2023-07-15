@extends('layouts.template')

@section('title','EDITAR CARRERA')

@section('contenido')
@include('layouts.partials.navbar')  

<main>
    <div class="container py-4">
        <h2>Editar Carrera</h2>

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

        <form action="{{url('degrees/'.$degree->id)}}" method="post">   
            @method("PUT")    
            @csrf
            

            <div class="mb-3 row">
                <label for="degree_name" class="col-sm-2 col-form-label">Nombre Carrera</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="degree_name" id="degree_name" value="{{$degree->degree_name}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="faculty" class="col-sm-2 col-form-label">Facultad</label>
                <div class="col-sm-5">
                    <select name="faculty" id="faculty" class="form-select">     
                    <option value="Salud" {{ $degree->faculty == 'Salud' ? 'selected' : '' }}>Salud</option>
                        <option value="Ingeniería" {{ $degree->faculty == 'Ingeniería' ? 'selected' : '' }}>
                            Ingeniería
                        </option>
                        <option value="Ciencias Políticas" {{ $degree->faculty == 'Ciencias Políticas' ? 'selected' : '' }}>
                            Ciencias Políticas
                        </option>
                        <option value="Licenciaturas" {{ $degree->faculty == 'Licenciaturas' ? 'selected' : '' }}>
                            Licenciaturas
                        </option>
                    </select>
                </div>
            </div>

            
            <a href="{{url('degrees')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>