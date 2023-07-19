@extends('layout')
	@section('contenido')
	<h2>Consulta de pacientes</h2>
    <br>
    <form action="/paciente" method="get">
        <div class="mb-3">
            <label class="form-label">Buscar por apellido:</label>
            <input type="search" class="form-control" id="filtro" name="filtro">
        </div>
    </form>
    <br>
    <table id='pacientes' class="table table-striped">
        <tr><th>NIF</th><th>NOMBRE</th><th>APELLIDOS</th><th></th></tr>
        
    </table>
    
    @endsection
