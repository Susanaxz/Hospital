<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Paciente;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Validation\Rule;

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

    public function consultaPacientes()
    {
        // $pacientes = Paciente::all();
        // return view('consulta', ['pacientes' => $pacientes]);
        $datos = request()->all();
        $datos['pacientes'] = Paciente::consulta($datos['filtro'] ?? null);
        return view('consulta', $datos);
    }

    public function consultaPaciente($idpaciente = null)
    {
        if (!$idpaciente) {
            $datos['mensaje'] = 'No se ha seleccionado ningún paciente, debe seleccionar uno en consulta';
            return view('consulta', $datos);
        } else {
            $datos['paciente'] = Paciente::find($idpaciente);
        }
        return view('mantenimiento', $datos);
    }

    public function modificacionPaciente(Paciente $paciente)
    {

        try {
            if (!$paciente->idpaciente) {
                throw new Exception('Se debe seleccionar un paciente en consulta');
            }
        } catch (Exception $e) {
            $datos['mensajes'] = $e->getMessage();
        }
        // recupera los datos del formulario
        $datos = request()->all(); // recupera todos los datos del formulario

        // definir las reglas de validacion de Validator
        $rules = array(
            'nif' => ['required', Rule::unique('paciente')->ignore($paciente->idpaciente, 'idpaciente')],
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fechaingreso' => 'required|date',
        );

        $validator = Validator::make($datos, $rules);

        // comprobar si la validacion ha fallado
        if ($validator->fails()) {
            // si la validacion ha fallado, redirigir al formulario manteniminetno y mostrar los errores de validacion
            return redirect('mantenimiento')
                ->withErrors($validator)
                ->withInput();
        } else {
            // la validacion no ha fallado
            // modificar el paciente en la base de datos utilizando el metodo del modelo Paciente
            $paciente->update($datos);

            if (!$paciente->getChanges()) {
                $datos['mensaje'] = 'No se ha modificado ningún dato';
            } else {
                $datos['mensaje'] = 'Paciente modificado correctamente';
            }
            $datos['paciente'] = $paciente;
            return view('mantenimiento', $datos);
        }
    }


        

    public function bajaPaciente(Paciente $paciente)
    {
        try {
            if (!$paciente->idpaciente) {
                throw new Exception('Se debe seleccionar un paciente en consulta');
            }
        } catch (Exception $e) {
            $datos['mensajes'] = $e->getMessage();
        }

        try {
            $paciente->delete();
            $datos['mensaje'] = 'Paciente dado de baja correctamente';
        } catch (QueryException $e) {
            $datos['mensaje'] = $e->getMessage();
        }

        return view('mantenimiento', $datos);
    }
}
