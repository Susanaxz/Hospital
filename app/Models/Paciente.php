<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente'; // nombre de la tabla
    protected $primaryKey = 'idpaciente'; // id de la tabla paciente
    public $timestamps = false; // no tiene timestamps

}
