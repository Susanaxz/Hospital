<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Paciente;
use Illuminate\Database\QueryException;

class PacienteController extends Controller
{
    public function altaPaciente(){
        // recupera los datos del formulario
        $paciente = request()->all(); // recupera todos los datos del formulario

        // definir las reglas de validacion de Validator
        $rules = array (
            'nif' => 'required|unique:paciente,nif',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fechaingreso' => 'required|date',
        );

        // crear el objeto Validator
        $validator = Validator::make($paciente, $rules);

        // comprobar si la validacion ha fallado
        if ($validator->fails()) {
            // dd($validator);
            // redirigir al formulario de alta de paciente y mostrar los errores de validacion 
            return redirect('alta')
                ->withErrors($validator)
                ->withInput();
        } else {
            // la validacion no ha fallado
            // insertar el paciente en la base de datos utilizando el metodo del modelo Paciente
            try {
                $datos['paciente'] = Paciente::alta([
                    'nif' => $paciente['nif'],
                    'nombre' => $paciente['nombre'],
                    'apellidos' => $paciente['apellidos'],
                    'fechaingreso' => $paciente['fechaingreso'],
                    'fechaalta' => null
                ]);

                
                // redirigir a la vista de alta de paciente y mostrar mensaje de confirmacion
                $datos['mensaje'] = 'Paciente dado de alta correctamente';
                return view('alta', $datos);

            } catch (QueryException $e) {
                $datos['paciente'] = $paciente;
                $datos['mensajes'] = $e->getMessage();

                return view('alta', $datos);
            }
            
        }
        
    }

    public function consultaPaciente()
    {
    }

    public function modificacionPaciente()
    {
    }

    public function bajaPaciente()
    {
    }
}
