<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sector_fase extends Model
{
    use HasFactory;

    protected $table = 'sector_fases';

    protected $fillable = [
        'ob',
        
        'sector_id',
    ];
}
