<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sector_empresa extends Model
{
    use HasFactory;

    protected $table = 'sector_empresas';

    protected $fillable = [
        'cii',
        'act',
        'ip',
        'sector_id'
    ];
}
