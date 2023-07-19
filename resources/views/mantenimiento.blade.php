@extends('layout')
	@section('contenido')
	<h2>Mantenimiento paciente</h2>
    <br>
	<form id='formulario' method='post' action="/paciente/">
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
        <div class="mb-3">
            <label class="form-label">Fecha Alta Médica:</label>
            <input type="date" class="form-control" id="fechaalta" name="fechaalta">
        </div>
        <br>
        <button id="modificacion" name="modificacion" class="btn btn-primary">Modificar paciente</button>
        <button id="baja" name="baja" class="btn btn-danger">Baja paciente</button>
        <br>
	</form>
    <script>
        
    </script>
    @endsection