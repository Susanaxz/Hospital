@extends('layout')
	@section('contenido')
	<h2>Alta paciente</h2>
	<form id='formulario' method='POST' action='/paciente'>
        <div class="mb-3">
            <label class="form-label">NIF:</label>
            <input type="text" class="form-control" id="nif" name="nif">
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha Ingreso:</label>
            <input type="date" class="form-control" id="fechaingreso" name="fechaingreso">
        </div>
        <br>
        <button type="submit" id="alta" name="alta" class="btn btn-success">Alta paciente</button>
        <br>
	</form>
    @endsection
