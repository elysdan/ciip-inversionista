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
         'fase1i',
          'fase2i',
           'fase3i',
            'fase4i',
             'fase5i',
              'fase6i',
               'fase7i',
        
         'fase1f',
          'fase2f',
           'fase3f',
            'fase4f',
             'fase5f',
              'fase6f',
               'fase7f',
               
         'fase1status',
          'fase2status',
           'fase3status',
            'fase4status',
             'fase5status',
              'fase6status',
               'fase7status',
    ];
}
