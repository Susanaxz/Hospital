@extends('layout')
	@section('contenido')
	<h2>Mantenimiento paciente</h2>
    <br>
	<form id='formulario' method='post' action="/paciente/{{ $paciente->idpaciente ?? null}}">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label class="form-label">NIF:</label>
            <input type="text" class="form-control" id="nif" name="nif" value="{{old('nif') ?? $paciente->nif ?? ''}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre') ?? $paciente->nombre ?? ''}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{old('apellidos') ?? $paciente->apellidos ?? ''}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Ingreso:</label>
            <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" value="{{old('fechaingreso') ?? $paciente->fechaingreso ?? ''}}">

        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Alta Médica:</label>
            <input type="date" class="form-control" id="fechaalta" name="fechaalta" value="{{old('fechaalta') ?? $paciente->fechaalta ?? ''}}">

        </div>
        <br>
        <button id="modificacion" name="modificacion" class="btn btn-primary">Modificar paciente</button>
        <button id="baja" name="baja" class="btn btn-danger">Baja paciente</button>
        <br>
	
    <br><br>

    <h5>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @else
        <p>{{ $mensaje ?? null }}</p>
        @endif
    </h5>
    </form>


    <script>
        
    </script>
    @endsection
