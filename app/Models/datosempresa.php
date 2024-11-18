<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datosempresa extends Model
{
    use HasFactory;

    protected $table = 'datos_empresas';

    protected $fillable = [
        'razonsocial',
        'rif',
        'identificador',
        'pais_origen',
        'lregistro',
        'direccion',
        'foto',
        'status',
        'correo',
        'correlativo',
        'telefono',
        
    ];

}
