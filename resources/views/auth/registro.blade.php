@extends('layout')
	@section('contenido')
    
	<h2>Registro de usuario</h2>
	<form id='formulario' method='POST' action="{{ route('registro') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIF:</label>
            <input type="text" class="form-control" id="nif"  name="nif">
        </div>
        @error('nif')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre"  name="nombre">
        </div>
        @error('nombre')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos"  name="apellidos">
        </div>
        @error('apellidos')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" id="email"  name="email">
        </div>
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="password" class="form-control" id="password"  name="password">
        </div>
        @error('password')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Confirmar Password:</label>
            <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation">
        </div>
        @error('password_confirmation')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <br>
        <button type="submit" id="registro" name="registro" class="btn btn-success">Registrar</button>
	</form>
    @endsection
