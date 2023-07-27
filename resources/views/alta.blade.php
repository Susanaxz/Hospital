@extends('layout')
	@section('contenido')
	<h2>Alta paciente</h2>
	<form id='formulario' method='POST' action="'/paciente'">
        @csrf
        <div class="mb-3">
            <label class="form-label" >NIF:</label>
            <input type="text" class="form-control" id="nif" name="nif" value="{{old('nif') ?? $paciente->nif ?? null }}">

        </div>
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre') ?? $paciente->nombre ?? null }}">

        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{old('apellidos') ?? $paciente->apellidos ?? null }}">

        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Ingreso:</label>
            <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" value="{{old('fechaingreso') ?? $paciente->fechaingreso?? null }}">

        </div>
        <br>
        <button type="submit" id="alta" name="alta" class="btn btn-success">Alta paciente</button>
        <br><br>
        <h4>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @else
            <p>{{ $mensaje ?? null }}</p>
            @endif
        </h4>

	</form>
    @endsection
