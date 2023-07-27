<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Auth\UsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Ruta del login
Route::get('/login', [VistasController::class, 'login'])->name('login');

// Ruta del login post
Route::post('/login', [UsuariosController::class, 'login'])->name('login');

// Ruta logout
Route::get('/logout', [VistasController::class, 'logout'])->name('logout');

// Ruta de login post
Route::post('logout', [UsuariosController::class, 'logout'])->name('logout');


// Ruta de registro
Route::get('/registro', [VistasController::class, 'registro'])->name('registro');

// ruta de registro post
Route::post('registro', [UsuariosController::class, 'alta'])->name('altaRegistro');

//Ruta raíz de entrada a la aplicación
Route::get('/', [VistasController::class, 'home'])->name('home');

// Ruta asociada a la opción de Alta Paciente del menú
Route::get('/alta', [VistasController::class, 'alta'])->name('alta');

//Ruta asociada a la opción de Consulta Paciente del menú
Route::get('/consulta', [VistasController::class, 'consulta'])->name('consulta');

// Ruta asociada a la opción de Baja/Modificación Paciente del menú
Route::get('/mantenimiento', [VistasController::class, 'mantenimiento'])->name('mantenimiento');

//operativas de alta, consulta, modificación y baja de pacientes

// Ruta asociada a la consulta de un paciente seleccionado en la vista que carga mantenimiento.blade.php
Route::get('/paciente/{idpaciente}', [PacienteController::class, 'consultaPaciente'])->name('consultaPaciente');

// Ruta asociada a la consulta de todos los pacientes
Route::get('/paciente', [PacienteController::class, 'consultaPacientes'])->name('consultaPacientes');

//Ruta asociada a la operativa de alta de paciente en la vista alta.blade.php
Route::post('/paciente', [PacienteController::class, 'altaPaciente'])->name('altaPaciente');

//Ruta asociada a la operativa de modificación de paciente en la vista mantenimiento.blade.php
Route::put('/paciente/{paciente?}', [PacienteController::class, 'modificacionPaciente'])->name('modificacionPaciente');

//Ruta asociada a la operativa de baja de paciente en la vista mantenimiento.blade.php
Route::delete('/paciente/{paciente?}', [PacienteController::class, 'bajaPaciente'])->name('bajaPaciente');


