<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RrssTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rrss')->delete();
        
        \DB::table('rrss')->insert(array (
            0 => 
            array (
                'id' => 1,
                'red' => 'Twitter / X',
            ),
            1 => 
            array (
                'id' => 2,
                'red' => 'Instagram',
            ),
            2 => 
            array (
                'id' => 3,
                'red' => 'Facebook',
            ),
            3 => 
            array (
                'id' => 4,
                'red' => 'Linkedin',
            ),
        ));
        
        
    }
}