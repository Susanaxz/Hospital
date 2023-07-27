@extends('layout')
	@section('contenido')
	<h2>Login de usuario</h2>
	<form id='formulario' method='POST' action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIF:</label>
            <input type="text" class="form-control" id="nif"  name="nif" value="{{ old('nif') ?? ''}}">
        </div>
        @error('nif')
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="recordar">
                <label class="form-check-label" for="flexCheckDefault">
                    Recuérdame
                </label>
            </div>
        </div>
        @error('login')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        @if (session('status'))
            <div class="alert alert-warning" role="alert">
                {{ session('status') ?? null }}
            </div>
        @endif

        <div class="d-flex justify-content-between">
            <button type="submit" id="login" name="login" class="btn btn-success">Login</button>

            <span><a href="{{ route('registro') }}" class="link-underline-primary">Registro</a></span>
        </div>
	</form>
    @endsection
