<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datosembajada extends Model
{
    use HasFactory;

     protected $table = 'datos_embajadas';

    protected $fillable = [
        'enterprise_id',
        'delegate_id',
        'ne',
        'oe',
        'inv',
        'ex',
        'al',
        'ob',
        'pais',
        'status',
        
    ];
}
