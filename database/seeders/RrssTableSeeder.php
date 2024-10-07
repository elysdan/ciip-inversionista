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
                'red' => 'twitter',
            ),
            1 => 
            array (
                'id' => 2,
                'red' => 'instagram',
            ),
            2 => 
            array (
                'id' => 3,
                'red' => 'facebook',
            ),
            3 => 
            array (
                'id' => 4,
                'red' => 'linkedin',
            ),
        ));
        
        
    }
}