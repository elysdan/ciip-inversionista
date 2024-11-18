<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inversionistanatural extends Model
{
    use HasFactory;

    protected $table = 'inversionista_naturals';

    protected $fillable = [
        
        'nombre',
        'apellido',
        'doc_identidad',
        'nacionalidad',
        'fecha_nacimiento',
        'edad',
        'estado_civil',
        'sexo',
        'direccion',
        'telefono',
        'email',
        'rrss',
        'status',
        'foto',
        
    ];

}
