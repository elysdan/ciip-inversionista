<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('generos')->delete();
        
        \DB::table('generos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'genero' => 'Masculino',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'genero' => 'Femenino',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}