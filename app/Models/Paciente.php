<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\QueryException;


class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente'; // nombre de la tabla
    protected $primaryKey = 'idpaciente'; // id de la tabla paciente
    public $timestamps = false; // no tiene timestamps


    protected $fillable = [
        'nif',
        'nombre',
        'apellidos',
        'fechaingreso',
        'fechaalta'
    ];

    public static function alta($datos)
    {
        try {
            $paciente = Paciente::create([
                'nif' => $datos['nif'],
                'nombre' => $datos['nombre'],
                'apellidos' => $datos['apellidos'],
                'fechaingreso' => $datos['fechaingreso'],
                'fechaalta' => null
            ]);
            return $paciente;
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }

    public static function consulta($mostrar, $filtro)
    {
        $pacientes = Paciente::where('apellidos', 'like', "%$filtro%")
            ->orderBy('nombre', 'ASC')
            ->orderBy('apellidos', 'ASC')
            ->paginate($mostrar)
            ->appends(['filtro' => $filtro, 'mostrar' => $mostrar])
            ->withQueryString();
        return $pacientes;
    }
}
