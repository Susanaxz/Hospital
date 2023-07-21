<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\PacienteController;

class VistasController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function alta()
    {
        return view('alta');
    }

    public function consulta()
    {
        return redirect()->action([PacienteController::class, 'consultaPacientes']);
    }

    public function mantenimiento()
    {
        return view('mantenimiento');
    }
}
