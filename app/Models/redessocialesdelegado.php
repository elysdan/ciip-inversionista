<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redessocialesdelegado extends Model
{
    use HasFactory;

    protected $table = 'redes_sociales_delegados';

    protected $fillable = [
        'site',
        'username',
        'delegate_id',
        
        
    ];
}
