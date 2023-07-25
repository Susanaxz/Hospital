<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\PacienteController;

class VistasController extends Controller
{

    public function login()
    {
        return 'pagina de login';
        // return view('auth.login');
    }

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

    //contructor para que no se pueda acceder a las vistas de alta y mantenimiento sin estar logueado
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['alta', 'mantenimiento']]);
    } 
}
