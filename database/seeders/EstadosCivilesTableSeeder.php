<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadosCivilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estados_civiles')->delete();
        
        \DB::table('estados_civiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'estado' => 'Soltero',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'estado' => 'Casado',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'estado' => 'Viudo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'estado' => 'Divorciado',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'estado' => 'En concubinato',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}