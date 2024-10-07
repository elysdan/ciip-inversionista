<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenidoempresa extends Model
{
    use HasFactory;
     protected $table = 'contenido_empresas';

     protected $fillable = [
        'status',
         'elaborado',
          'revisado',
           'certificado',
            'aprobado',
            'oci',
            'fbi',
            'ofac',
            'ue',
            'cso',
            'ip',
            'icij',
            'tsj',
            'rnc',
            'ef',
            'ex',
        
    ];
}
