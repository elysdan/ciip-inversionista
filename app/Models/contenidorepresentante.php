<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenidorepresentante extends Model
{
    use HasFactory;
     protected $table = 'contenido_representantes';

      protected $fillable = [
        'status',
         'elaborado',
          'revisado',
           'certificado',
            'aprobado',
            'oci',
            'ipol',
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
