<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asociadorxempresasxrepresentante extends Model
{
    use HasFactory;
     protected $table = 'asociador_empresas_representantes';

      protected $fillable = [
        'enterprise_id',
         'delegate_id',
          'type',
          
        
    ];
}
