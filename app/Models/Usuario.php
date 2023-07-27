<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'idusuario';

    public $timestamps = false;

    protected $fillable = [
        'nif',
        'nombre',
        'apellidos',
        'email',
        'password',
        
    ];

    protected $hidden = [
        'password'
    ];
}
